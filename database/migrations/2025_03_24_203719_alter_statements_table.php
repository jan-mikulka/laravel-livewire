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
        Schema::table('statements', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->unsignedBigInteger('chapter_id')->nullable()->change();
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');

            $table->string('page')->nullable();
            $table->integer('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->unsignedBigInteger('chapter_id')->nullable(false)->change();
            $table->dropColumn('source_id');
            $table->dropColumn('page');
            $table->dropColumn('time');
        });
    }
};
