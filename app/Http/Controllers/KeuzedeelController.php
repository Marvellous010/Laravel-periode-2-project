<?php

namespace App\Http\Controllers;

use App\Models\Keuzedeel;
use Illuminate\Http\Request;

class KeuzedeelController extends Controller
{
    public function index()
    {
        $keuzedelen = Keuzedeel::orderBy('id', 'desc')->get();
        return view('admin.keuzedelen', compact('keuzedelen'));
    }

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

        $data['herhaalbaar'] = $request->has('herhaalbaar') ? 1 : 0;
        $data['actief'] = $request->has('actief') ? 1 : 0;

        if ($request->hasFile('afbeelding')) {
            $data['afbeelding'] = $request->file('afbeelding')->store('keuzedelen', 'public');
        } else {
            $data['afbeelding'] = null;
        }


        Keuzedeel::create($data);

        return back()->with('success', 'Keuzedeel opgeslagen ✅');
    }

    public function studentIndex()
    {
        $keuzedelen = Keuzedeel::where('actief', 1)
            ->orderBy('periode')
            ->orderBy('naam')
            ->get();

        return view('student_dashboard', compact('keuzedelen'));
    }

    public function show($id)
    {
        $keuzedeel = Keuzedeel::findOrFail($id);

        return view('keuzedelen', compact('keuzedeel'));
    }
}

