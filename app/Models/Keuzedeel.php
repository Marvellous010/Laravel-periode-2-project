<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Keuzedeel extends Model
{
    protected $table = 'keuzedelen';


    protected $fillable = [
        'naam',
        'code',
        'beschrijving',
        'periode',
        'docent',
        'locatie',
        'max_studenten',
        'min_studenten',
        'herhaalbaar',
        'actief',
        'afbeelding'
    ];

    public function inschrijvingen() {
        return $this->belongsToMany(User::class, 'inschrijvingen')
                    ->withPivot('status', 'cijfer')
                    ->withTimestamps();
    }
    public function show($id)
{
    $keuzedeel = Keuzedeel::findOrFail($id);

    return view('keuzedelen', compact('keuzedeel'));
}


}


