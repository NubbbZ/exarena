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
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('energy_generation')->nullable();
            $table->integer('battle_power')->nullable();
            $table->integer('required_energy')->nullable();
            $table->integer('action_point_cost')->nullable();
            $table->integer('has_conditional_energy_generation');
            $table->boolean('has_raid');
            $table->boolean('has_trigger');
            $table->string('trigger_effect')->nullable();
            $table->boolean('is_release_event_card');
            $table->boolean('is_super_pre_release_card');
            $table->boolean('is_rare_battle_card');
            $table->boolean('is_store_tournament_card');
            $table->boolean('is_judge_card');
            $table->boolean('is_winner_card');
            $table->boolean('is_alt_art_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
