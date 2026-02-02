
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAppSettings extends Migration
{
 public function up()
{
    // Only add user_id column and constraint if not already added
    if (!Schema::hasColumn('app_settings', 'user_id')) {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}

    public function down()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
