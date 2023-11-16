<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('image_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('language_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('courses')->onUpdate('cascade')->nullOnDelete();
            $table->string('heading');
            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->boolean('is_private');
            $table->unsignedInteger('students_count');
            $table->unsignedTinyInteger('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
