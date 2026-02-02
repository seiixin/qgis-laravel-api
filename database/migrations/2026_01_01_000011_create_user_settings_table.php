<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->string('user_identifier',100)->nullable();
            $table->string('language',30)->default('English');
            $table->enum('font_size',['small','medium','large'])->default('medium');
            $table->boolean('text_to_speech')->default(false);
            $table->boolean('speech_to_text')->default(false);
            $table->boolean('high_contrast')->default(false);
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down(): void {
        Schema::dropIfExists('user_settings');
    }
};
