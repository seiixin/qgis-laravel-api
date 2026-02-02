<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('user_contacts', function (Blueprint $table) {
        $table->string('user_identifier')->nullable()->change();  // Set nullable
    });
}

public function down()
{
    Schema::table('user_contacts', function (Blueprint $table) {
        $table->string('user_identifier')->nullable(false)->change();  // Revert to not nullable
    });
}

};
