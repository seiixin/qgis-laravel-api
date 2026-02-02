<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('impact_results', function (Blueprint $table) {
            $table->id();
            $table->string('scenario_name',100)->nullable();
            $table->string('fault_name',100)->nullable();
            $table->integer('casualties')->nullable();
            $table->decimal('economic_loss',12,2)->nullable();
            $table->string('currency',10)->default('PHP');
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down(): void {
        Schema::dropIfExists('impact_results');
    }
};
