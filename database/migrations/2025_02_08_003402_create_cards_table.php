<?php

use App\Enums\CardColor;
use App\Enums\CardType;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->enum('color_type', CardColor::cases());
            $table->string('card_number')->nullable();
            $table->string('image')->nullable();
            $table->string('note')->nullable();
            $table->foreignId('product_id')->constrained('products');
            $table->enum('card_type', CardType::cases());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_cards');
    }
};
