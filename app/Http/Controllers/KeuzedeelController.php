<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuzedeelController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'naam' => ['required','string','max:255'],
            'code' => ['required','string','max:50'],
            'beschrijving' => ['required','string','max:2000'],

            'periode' => ['required','string','max:10'],
            'docent' => ['nullable','string','max:255'],
            'locatie' => ['nullable','string','max:255'],

            'max_studenten' => ['required','integer','min:1'],
            'min_studenten' => ['required','integer','min:0'],

            'herhaalbaar' => ['nullable'],
            'actief' => ['nullable'],

            'afbeelding' => ['nullable','file','mimes:jpg,jpeg,png,webp','max:4096'],
        ]);

        $herhaalbaar = $request->has('herhaalbaar') ? 1 : 0;
        $actief = $request->has('actief') ? 1 : 0;

        $afbeeldingPad = null;
        if ($request->hasFile('afbeelding')) {
            $afbeeldingPad = $request->file('afbeelding')->store('keuzedelen', 'public');
        }

        DB::table('keuzedelen')->insert([
            'naam' => $data['naam'],
            'code' => $data['code'],
            'beschrijving' => $data['beschrijving'],

            'periode' => $data['periode'],
            'docent' => $data['docent'] ?? null,
            'locatie' => $data['locatie'] ?? null,

            'max_studenten' => $data['max_studenten'],
            'min_studenten' => $data['min_studenten'],

            'herhaalbaar' => $herhaalbaar,
            'actief' => $actief,

            'afbeelding' => $afbeeldingPad,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Keuzedeel opgeslagen ✅');
    }
}
