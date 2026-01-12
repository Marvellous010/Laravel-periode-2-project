<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keuzedeel;
use App\Models\Inschrijving;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function showImportForm()
    {
        return view('admin.student_inlezen');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240'
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        
        $csvData = array_map(function($line) {
            return str_getcsv($line, ';');
        }, file($path));

        $imported = 0;
        $errors = [];
        $keuzedelenCreated = 0;
        $keuzedelenMapping = $this->getKeuzedeelMapping($csvData);
        
        $this->ensureKeuzedelenExist($keuzedelenMapping, $keuzedelenCreated);

        foreach ($csvData as $index => $row) {
            if ($index < 7) continue;
            
            if (empty($row[2]) || empty($row[3])) continue;

            try {
                $studentnummer = trim($row[2]);
                $naam = trim($row[3]);
                $opleidingscode = trim($row[4]);
                $cohort = trim($row[6] ?? '');

                $naamParts = explode(' ', $naam);
                $voornaam = $naamParts[0];
                $achternaam = implode(' ', array_slice($naamParts, 1));

                $user = User::updateOrCreate(
                    ['studentnummer' => $studentnummer],
                    [
                        'voornaam' => $voornaam,
                        'achternaam' => $achternaam,
                        'email' => strtolower($studentnummer) . '@student.tcr.nl',
                        'password' => Hash::make('password123'),
                        'rol' => 'student'
                    ]
                );

                $this->processKeuzedelen($user, $row, $keuzedelenMapping);
                
                $imported++;
            } catch (\Exception $e) {
                $errors[] = "Regel {$index}: " . $e->getMessage();
            }
        }

        $message = "";
        if ($imported > 0) {
            $message = "{$imported} studenten succesvol ingelezen!";
            if ($keuzedelenCreated > 0) {
                $message .= " ({$keuzedelenCreated} nieuwe keuzedelen aangemaakt)";
            }
            if (count($errors) > 0) {
                $message .= " Let op: " . count($errors) . " fouten gevonden.";
            }
            return back()->with('success', $message);
        } else {
            return back()->with('error', 'Geen studenten ingelezen. Controleer het bestand.');
        }
    }

    private function getKeuzedeelMapping($csvData)
    {
        $mapping = [];
        
        if (isset($csvData[4])) {
            $headerRow = $csvData[4];
            
            for ($i = 7; $i < count($headerRow); $i += 4) {
                if (!empty($headerRow[$i])) {
                    $keuzedeelCode = trim($headerRow[$i]);
                    $mapping[$i] = $keuzedeelCode;
                }
            }
        }
        
        return $mapping;
    }

    private function ensureKeuzedelenExist($keuzedelenMapping, &$keuzedelenCreated)
    {
        foreach ($keuzedelenMapping as $code) {
            $exists = Keuzedeel::where('code', $code)->exists();
            
            if (!$exists) {
                Keuzedeel::create([
                    'naam' => 'Keuzedeel ' . $code,
                    'code' => $code,
                    'beschrijving' => 'Automatisch aangemaakt uit CSV import',
                    'periode' => '1',
                    'max_studenten' => 30,
                    'min_studenten' => 10,
                    'herhaalbaar' => 0,
                    'actief' => 1
                ]);
                $keuzedelenCreated++;
                Log::info("Keuzedeel automatisch aangemaakt: {$code}");
            }
        }
    }

    private function processKeuzedelen($user, $row, $keuzedelenMapping)
    {
        foreach ($keuzedelenMapping as $columnIndex => $keuzedeelCode) {
            $resIndex = $columnIndex;
            $spIndex = $columnIndex + 1;
            
            if (isset($row[$resIndex]) && isset($row[$spIndex])) {
                $res = trim($row[$resIndex]);
                $sp = trim($row[$spIndex]);
                
                if (!empty($sp) && is_numeric($sp) && $sp > 0) {
                    $keuzedeel = Keuzedeel::where('code', $keuzedeelCode)->first();
                    
                    if ($keuzedeel) {
                        $status = 'completed';
                        $cijfer = null;
                        
                        if ($res === 'x' || $res === 'pv') {
                            $status = 'pending';
                        } elseif (is_numeric($res) && $res > 0) {
                            $cijfer = floatval($res);
                            $status = 'completed';
                        }
                        
                        Inschrijving::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'keuzedeel_id' => $keuzedeel->id
                            ],
                            [
                                'status' => $status,
                                'cijfer' => $cijfer
                            ]
                        );
                    } else {
                        Log::warning("Keuzedeel niet gevonden: {$keuzedeelCode}");
                    }
                }
            }
        }
    }
}