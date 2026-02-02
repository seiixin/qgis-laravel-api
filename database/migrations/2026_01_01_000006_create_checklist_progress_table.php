<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('checklist_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained('checklist_items')->cascadeOnDelete();
            $table->string('user_identifier',100)->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    public function down(): void {
        Schema::dropIfExists('checklist_progress');
    }
};
