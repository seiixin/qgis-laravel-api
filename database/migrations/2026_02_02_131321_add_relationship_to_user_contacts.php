<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToUserContacts extends Migration
{
    public function up()
    {
        Schema::table('user_contacts', function (Blueprint $table) {
            $table->string('relationship')->nullable(); // Add the relationship column
        });
    }

    public function down()
    {
        Schema::table('user_contacts', function (Blueprint $table) {
            $table->dropColumn('relationship'); // Drop the column in case of rollback
        });
    }
}
