<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('inschrijvingen', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('keuzedeel_id')->constrained('keuzedelen')->onDelete('cascade');
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->timestamps();
    
    $table->unique(['user_id', 'keuzedeel_id']); // Voorkom dubbele inschrijvingen
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inschrijvingen');
    }
};
