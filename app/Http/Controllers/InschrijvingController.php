<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuzedeel;
use Illuminate\Support\Facades\Auth;

class InschrijvingController extends Controller {
    public function store(Request $request) {
        $request->validate(['keuzedeel_id' => 'required|exists:keuzedelen,id']);
        
        $keuzedeel = Keuzedeel::findOrFail($request->keuzedeel_id);
        $user = Auth::user();
        
        // Check of gebruiker al ingeschreven is
        if ($user->keuzedelen()->where('keuzedeel_id', $keuzedeel->id)->exists()) {
            return response()->json([
                'success' => false, 
                'message' => 'Je bent al ingeschreven voor dit keuzedeel'
            ], 422);
        }
        
        // Check max_studenten niet overschreden
        $huidigeInschrijvingen = $keuzedeel->inschrijvingen()->count();
        if ($huidigeInschrijvingen >= $keuzedeel->max_studenten) {
            return response()->json([
                'success' => false, 
                'message' => 'Dit keuzedeel is vol'
            ], 422);
        }
        
        // Voeg inschrijving toe
        $user->keuzedelen()->attach($keuzedeel->id, ['status' => 'pending']);
        
        return response()->json([
            'success' => true, 
            'message' => 'Inschrijving succesvol!'
        ]);
    }
}
