<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keuzedeel;
use Illuminate\Support\Facades\Hash;

class CsvImportController extends Controller
{
    /**
     * Toon het CSV import formulier
     */
    public function showImportForm()
    {
        return view('admin.student_inlezen');
    }

    /**
     * Importeer studenten en keuzedelen uit CSV bestand
     * 
     * CSV formaat:
     * - Scheidingsteken: ;
     * - Kolom 3: Studentnummer
     * - Kolom 4: Naam
     * - Regel 5: Keuzedeel codes in header
     * - Email wordt: [studentnummer]@student.tcr.nl
     * - Wachtwoord wordt: password123
     */
    public function importCsv(Request $request)
    {
        // Controleer of er een bestand is geupload
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240'
        ]);

        // Haal het bestand op
        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        
        // Lees alle regels
        $lines = file($path);
        
        // Converteer regels naar arrays
        $rows = [];
        foreach ($lines as $line) {
            $rows[] = str_getcsv($line, ';');
        }
        
        // Tellers
        $aantalStudenten = 0;
        $aantalKeuzedelen = 0;
        $fouten = [];

        // Maak keuzedelen aan uit de header (regel 5, index 4)
        if (isset($rows[4])) {
            $headerRow = $rows[4];
            
            // Loop door kolommen, begin bij kolom 8 (index 7), elke 4 kolommen
            for ($k = 7; $k < count($headerRow); $k += 4) {
                $code = trim($headerRow[$k]);
                
                if (!empty($code)) {
                    // Maak keuzedeel aan als het nog niet bestaat
                    $bestaatAl = Keuzedeel::where('code', $code)->exists();
                    
                    if (!$bestaatAl) {
                        Keuzedeel::create([
                            'naam' => 'Keuzedeel ' . $code,
                            'code' => $code,
                            'beschrijving' => 'Automatisch aangemaakt uit CSV',
                            'periode' => '1',
                            'max_studenten' => 30,
                            'min_studenten' => 10,
                            'herhaalbaar' => 0,
                            'actief' => 1
                        ]);
                        $aantalKeuzedelen++;
                    }
                }
            }
        }

        // Loop door elke student regel (begin bij regel 8, index 7)
        for ($i = 7; $i < count($rows); $i++) {
            $kolommen = $rows[$i];
            
            // Sla lege regels over
            if (empty($kolommen[2]) || empty($kolommen[3])) {
                continue;
            }
            
            try {
                // Haal studentnummer en naam uit de kolommen
                $studentnummer = trim($kolommen[2]);
                $naam = trim($kolommen[3]);
                
                // Split naam in voornaam en achternaam
                $naamDelen = explode(' ', $naam);
                $voornaam = $naamDelen[0];
                $achternaam = count($naamDelen) > 1 ? implode(' ', array_slice($naamDelen, 1)) : '';
                
                // Maak of update de student
                User::updateOrCreate(
                    ['studentnummer' => $studentnummer],
                    [
                        'voornaam' => $voornaam,
                        'achternaam' => $achternaam,
                        'email' => strtolower($studentnummer) . '@student.tcr.nl',
                        'password' => Hash::make('password123'),
                        'rol' => 'student'
                    ]
                );
                
                $aantalStudenten++;
                
            } catch (\Exception $e) {
                $fouten[] = "Regel " . ($i + 1) . ": " . $e->getMessage();
            }
        }

        // Ga terug met resultaat
        if ($aantalStudenten > 0 || $aantalKeuzedelen > 0) {
            $bericht = "<strong>{$aantalStudenten} studenten geïmporteerd!</strong>";
            
            if ($aantalKeuzedelen > 0) {
                $bericht .= "<br>✅ {$aantalKeuzedelen} nieuwe keuzedelen aangemaakt";
            }
            
            if (count($fouten) > 0) {
                $bericht .= "<br><br>⚠️ " . count($fouten) . " fouten gevonden.";
            }
            
            return back()->with('success', $bericht);
        } else {
            return back()->with('error', 'Geen studenten kunnen importeren. Check het bestand.');
        }
    }
}
