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
        Schema::create('phrase_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('phrase_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('duration')->default(0);
            $table->unsignedTinyInteger('status')->comment('Answer status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phrase_reviews');
    }
};
