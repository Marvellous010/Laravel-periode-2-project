<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inschrijving extends Model
{
    protected $table = 'inschrijvingen';
    
    protected $fillable = [
        'user_id',
        'keuzedeel_id',
        'status',
        'cijfer'
    ];

    protected $casts = [
        'cijfer' => 'decimal:1'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function keuzedeel(): BelongsTo
    {
        return $this->belongsTo(Keuzedeel::class);
    }
}