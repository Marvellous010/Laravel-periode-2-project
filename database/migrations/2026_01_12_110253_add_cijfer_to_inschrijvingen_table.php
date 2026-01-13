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
        Schema::table('inschrijvingen', function (Blueprint $table) {
            $table->decimal('cijfer', 3, 1)->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inschrijvingen', function (Blueprint $table) {
            $table->dropColumn('cijfer');
        });
    }
};
