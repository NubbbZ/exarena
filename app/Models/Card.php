<?php

namespace App\Models;

use App\Enums\CardColor;
use App\Enums\CardTriggerEffect;
use App\Enums\CardType;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $timestamps = false;

    public $casts = [
        'color_type' => CardColor::class,
        'card_type' => CardType::class,
        'has_conditional_energy_generation' => 'boolean',
        'has_raid' => 'boolean',
        'has_trigger' => 'boolean',
        'trigger_effect' => CardTriggerEffect::class,
        'is_release_event_card' => 'boolean',
        'is_super_pre_release_card' => 'boolean',
        'is_rare_battle_card' => 'boolean',
        'is_store_tournament_card' => 'boolean',
        'is_judge_card' => 'boolean',
        'is_winner_card' => 'boolean',
        'is_alt_art_card' => 'boolean'
    ];

    protected $fillable = [
        // Main
        'name',
        'slug',
        'description',
        'color_type',
        'card_number',
        'image',
        'note',
        'product_id',
        'card_type',
        // Card Attributes
        'energy_generation',
        'battle_power',
        'required_energy',
        'action_point_cost',
        'has_conditional_energy_generation',
        'has_raid',
        'has_trigger',
        'trigger_effect',
        'is_release_event_card',
        'is_super_pre_release_card',
        'is_rare_battle_card',
        'is_store_tournament_card',
        'is_judge_card',
        'is_winner_card',
        'is_alt_art_card'
    ];

    public function Product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function CardAffinities ()
    {
        return $this->belongsToMany(CardAffinity::class);
    }
}
