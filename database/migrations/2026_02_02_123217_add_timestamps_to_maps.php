<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToMaps extends Migration
{
    public function up()
    {
        // Add timestamps only if they don't exist
        if (!Schema::hasColumn('maps', 'created_at')) {
            Schema::table('maps', function (Blueprint $table) {
                $table->timestamps(); // Adds 'created_at' and 'updated_at'
            });
        }
    }

    public function down()
    {
        Schema::table('maps', function (Blueprint $table) {
            $table->dropTimestamps(); // Removes 'created_at' and 'updated_at'
        });
    }
}
