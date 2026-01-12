<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuzedeel extends Model {
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
}
