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
        Schema::create('word_scores', function (Blueprint $table)
        {
            $table->id();

            $table->string('word');
            $table->string('provider');

            $table->integer('positive');
            $table->integer('negative');

            $table->decimal('score', '4', '2');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_scores');
    }
};
