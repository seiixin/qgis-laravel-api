<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('checklist_progress', function (Blueprint $table) {
            // Drop the foreign key so checklist_id can be any integer
            $table->dropForeign(['checklist_id']);
            $table->unsignedBigInteger('checklist_id')->change();
        });
    }

    public function down(): void {
        Schema::table('checklist_progress', function (Blueprint $table) {
            $table->foreign('checklist_id')->references('id')->on('checklist_items')->cascadeOnDelete();
        });
    }
};
