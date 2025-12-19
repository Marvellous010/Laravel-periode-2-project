<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuzedeel extends Model {
    protected $table = 'keuzedelen';
    
    public function inschrijvingen() {
        return $this->belongsToMany(User::class, 'inschrijvingen')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
