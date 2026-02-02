<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('emergency_hotlines', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name',100);
            $table->string('phone_number',30);
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down(): void {
        Schema::dropIfExists('emergency_hotlines');
    }
};
