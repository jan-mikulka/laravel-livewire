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
        Schema::create('statement_word', function (Blueprint $table) {
            $table->unsignedBigInteger('statement_id');
            $table->unsignedBigInteger('word_id');
            $table->primary(['statement_id', 'word_id']); // Composite key

            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('cascade');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');

            $table->index(['statement_id', 'word_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statement_word');
    }
};
