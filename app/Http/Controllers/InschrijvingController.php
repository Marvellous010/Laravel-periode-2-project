<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuzedeel;
use App\Models\Inschrijving;
use Illuminate\Support\Facades\Auth;

class InschrijvingController extends Controller {
    public function index() {
        $user = Auth::user();
        
        $huidigeInschrijvingen = $user->keuzedelen()
            ->wherePivot('status', 'pending')
            ->withPivot('created_at', 'cijfer')
            ->get();
        
        $geschiedenis = $user->keuzedelen()
            ->wherePivot('status', 'completed')
            ->withPivot('created_at', 'cijfer')
            ->orderBy('inschrijvingen.created_at', 'desc')
            ->get();
        
        return view('inschrijvingen', compact('huidigeInschrijvingen', 'geschiedenis'));
    }
    
    public function store(Request $request) {
        $request->validate(['keuzedeel_id' => 'required|exists:keuzedelen,id']);
        
        $keuzedeel = Keuzedeel::findOrFail($request->keuzedeel_id);
        $user = Auth::user();
        
        // Check of gebruiker al ingeschreven is of keuzedeel al heeft afgerond
        $bestaandeInschrijving = $user->keuzedelen()
            ->where('keuzedeel_id', $keuzedeel->id)
            ->withPivot('status')
            ->first();
            
        if ($bestaandeInschrijving) {
            if ($bestaandeInschrijving->pivot->status === 'completed') {
                return response()->json([
                    'success' => false, 
                    'message' => 'Je hebt dit keuzedeel al afgerond en kunt je niet opnieuw inschrijven'
                ], 422);
            }
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
    
    public function deleteOld()
    {
        $deleted = Inschrijving::where('status', 'completed')->delete();
        
        return back()->with('success', "{$deleted} oude inschrijvingen verwijderd!");
    }
    
    public function destroy($keuzedeelId)
    {
        $user = Auth::user();
        
        $inschrijving = Inschrijving::where('user_id', $user->id)
            ->where('keuzedeel_id', $keuzedeelId)
            ->first();
        
        if (!$inschrijving) {
            return response()->json([
                'success' => false,
                'message' => 'Je bent niet ingeschreven voor dit keuzedeel'
            ], 404);
        }
        
        if ($inschrijving->status === 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'Je kunt je niet uitschrijven van een afgerond keuzedeel'
            ], 422);
        }
        
        $inschrijving->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Je bent succesvol uitgeschreven!'
        ]);
    }
}
