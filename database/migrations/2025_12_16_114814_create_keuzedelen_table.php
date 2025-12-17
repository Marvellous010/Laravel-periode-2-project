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
        Schema::create('keuzedelen', function (Blueprint $table) {
            $table->id();

            $table->string('naam');
            $table->string('code', 50);
            $table->text('beschrijving');

            $table->string('periode', 10);
            $table->string('docent')->nullable();
            $table->string('locatie')->nullable();

            $table->integer('max_studenten');
            $table->integer('min_studenten');

            $table->boolean('herhaalbaar')->default(false);
            $table->boolean('actief')->default(true);

            $table->string('afbeelding')->nullable();

            // Laravel timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuzedelen');
    }
};
