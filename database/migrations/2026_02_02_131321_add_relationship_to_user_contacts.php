<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToUserContacts extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('user_contacts', 'relationship')) {
            Schema::table('user_contacts', function (Blueprint $table) {
                $table->string('relationship')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::table('user_contacts', function (Blueprint $table) {
            $table->dropColumn('relationship'); // Drop the column in case of rollback
        });
    }
}
