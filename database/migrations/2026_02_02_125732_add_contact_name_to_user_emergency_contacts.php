<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactNameToUserEmergencyContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column already exists
        if (!Schema::hasColumn('user_emergency_contacts', 'contact_name')) {
            Schema::table('user_emergency_contacts', function (Blueprint $table) {
                $table->string('contact_name')->nullable()->after('user_identifier');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_emergency_contacts', function (Blueprint $table) {
            $table->dropColumn('contact_name');
        });
    }
}
