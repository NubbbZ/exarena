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
        Schema::create('card_cardaffinity', function (Blueprint $table) {
            $table->foreignId('card_id')->constrained('cards');
            $table->foreignId('card_affinity_id')->constrained('card_affinities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_cardaffinities');
    }
};
