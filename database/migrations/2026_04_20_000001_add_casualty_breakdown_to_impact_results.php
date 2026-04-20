<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('impact_results', function (Blueprint $table) {
            $table->integer('slight_injuries_day')->nullable()->after('casualties');
            $table->integer('slight_injuries_night')->nullable()->after('slight_injuries_day');
            $table->integer('non_life_threatening_day')->nullable()->after('slight_injuries_night');
            $table->integer('non_life_threatening_night')->nullable()->after('non_life_threatening_day');
            $table->integer('life_threatening_day')->nullable()->after('non_life_threatening_night');
            $table->integer('life_threatening_night')->nullable()->after('life_threatening_day');
            $table->integer('fatalities_day')->nullable()->after('life_threatening_night');
            $table->integer('fatalities_night')->nullable()->after('fatalities_day');
            $table->string('color_day', 20)->nullable()->after('fatalities_night');
            $table->string('color_night', 20)->nullable()->after('color_day');
        });
    }

    public function down(): void {
        Schema::table('impact_results', function (Blueprint $table) {
            $table->dropColumn([
                'slight_injuries_day', 'slight_injuries_night',
                'non_life_threatening_day', 'non_life_threatening_night',
                'life_threatening_day', 'life_threatening_night',
                'fatalities_day', 'fatalities_night',
                'color_day', 'color_night',
            ]);
        });
    }
};
