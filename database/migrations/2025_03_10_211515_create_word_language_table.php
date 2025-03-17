<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('word_language', function (Blueprint $table) {
            $table->unsignedBigInteger('word_id');
            $table->unsignedBigInteger('language_id');
            $table->primary(['word_id', 'language_id']); // Composite key
            $table->timestamps(); // Optional: Add timestamps if needed

            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_language');
    }
};
