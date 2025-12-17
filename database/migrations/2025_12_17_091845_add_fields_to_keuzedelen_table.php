<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('keuzedelen', function (Blueprint $table) {
            // Voeg alleen toe als ze nog niet bestaan (veilig)
            if (!Schema::hasColumn('keuzedelen', 'periode')) {
                $table->string('periode', 10)->after('beschrijving');
            }
            if (!Schema::hasColumn('keuzedelen', 'docent')) {
                $table->string('docent')->nullable()->after('periode');
            }
            if (!Schema::hasColumn('keuzedelen', 'locatie')) {
                $table->string('locatie')->nullable()->after('docent');
            }
            if (!Schema::hasColumn('keuzedelen', 'max_studenten')) {
                $table->integer('max_studenten')->after('locatie');
            }
            if (!Schema::hasColumn('keuzedelen', 'min_studenten')) {
                $table->integer('min_studenten')->after('max_studenten');
            }
            if (!Schema::hasColumn('keuzedelen', 'herhaalbaar')) {
                $table->boolean('herhaalbaar')->default(false)->after('min_studenten');
            }
            if (!Schema::hasColumn('keuzedelen', 'actief')) {
                $table->boolean('actief')->default(true)->after('herhaalbaar');
            }
            if (!Schema::hasColumn('keuzedelen', 'afbeelding')) {
                $table->string('afbeelding')->nullable()->after('actief');
            }
        });
    }

    public function down(): void
    {
        Schema::table('keuzedelen', function (Blueprint $table) {
            // Alleen droppen als ze bestaan
            if (Schema::hasColumn('keuzedelen', 'afbeelding')) $table->dropColumn('afbeelding');
            if (Schema::hasColumn('keuzedelen', 'actief')) $table->dropColumn('actief');
            if (Schema::hasColumn('keuzedelen', 'herhaalbaar')) $table->dropColumn('herhaalbaar');
            if (Schema::hasColumn('keuzedelen', 'min_studenten')) $table->dropColumn('min_studenten');
            if (Schema::hasColumn('keuzedelen', 'max_studenten')) $table->dropColumn('max_studenten');
            if (Schema::hasColumn('keuzedelen', 'locatie')) $table->dropColumn('locatie');
            if (Schema::hasColumn('keuzedelen', 'docent')) $table->dropColumn('docent');
            if (Schema::hasColumn('keuzedelen', 'periode')) $table->dropColumn('periode');
        });
    }
};
