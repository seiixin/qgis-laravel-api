<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('user_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('user_identifier',100)->nullable();
            $table->string('contact_name',100);
            $table->string('contact_number',30);
            $table->string('relationship',50)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down(): void {
        Schema::dropIfExists('user_emergency_contacts');
    }
};
