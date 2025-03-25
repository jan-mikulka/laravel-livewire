<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the enum type
        DB::statement("CREATE TYPE source_type AS ENUM ('idea', 'book', 'article', 'video', 'audio')");

        // Create the sources table
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            // Use DB::statement to define the column with the custom enum type
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('author')->nullable();
            $table->string('domain')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE sources ADD COLUMN type source_type DEFAULT 'idea'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
        // Drop the enum type
        DB::statement("DROP TYPE source_type");
    }
};
