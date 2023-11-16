<?php

use App\Enums\PhraseUserStateEnum;
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
        Schema::create('phrase_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phrase_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('home')->default(0);
            $table->unsignedTinyInteger('state')->default(PhraseUserStateEnum::LEARN->value);
            $table->timestamp('studied_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phrase_user');
    }
};
