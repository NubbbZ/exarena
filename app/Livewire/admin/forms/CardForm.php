<?php

namespace App\Livewire\admin\forms;

use App\Enums\CardColor;
use App\Enums\CardTriggerEffect;
use App\Enums\CardType;
use App\Models\Card;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CardForm extends Form
{
    public ?Card $card;

    #[Validate]
    public $id, $name, $description, $color_type, $card_number, $image, $note, $product_id, $card_type;
    public $energy_generation, $battle_power, $required_energy, $action_point_cost;
    public $has_conditional_energy_generation, $has_raid, $has_trigger, $trigger_effect, $is_release_event_card, $is_super_pre_release_card, $is_rare_battle_card, $is_store_tournament_card, $is_judge_card, $is_winner_card, $is_alt_art_card;

    public function rules()
    {   
        return [
            'name' => [
                'nullable', 
                'string', 
                'max:255'
            ],
            'description' => [
                'nullable', 
                'string'
            ],
            'color_type' => [
                'nullable', 
                Rule::enum(CardColor::class)
            ],
            'card_number' => [
                'required', 
                'string'
            ],
            'image' => [
                'nullable:image',
                'max:2048'
            ],
            'note' => [
                'nullable', 
                'string'
            ],
            'product_id' => [
                'required', 
                'integer'
            ],
            'card_type' => [
                'required', 
                Rule::enum(CardType::class)
            ],
            'energy_generation' => [
                'nullable', 
                'integer'
            ],
            'battle_power' => [
                'nullable', 
                'integer'
            ],
            'required_energy' => [
                'nullable', 
                'integer'
            ],
            'action_point_cost' => [
                'nullable',
                'integer'
            ],
            'trigger_effect' => [
                'nullable',
                Rule::enum(CardTriggerEffect::class)
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setData (Card $card)
    {
        $this->card = $card;
        $this->fill(
            $card->only([
                'id', 
                'name',
                'description',
                'color_type',
                'card_number',
                'image',
                'note',
                'product_id',
                'card_type',
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
            ]), 
        );
    }
    
    public function create(): void
    {
        $this->validate();
        
        $path = 'cards/'.Product::find($this->product_id)->product_code;
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0755, true, true);
        }
        
        $values = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'color_type' => $this->color_type,
            'card_number' => $this->card_number,
            'image' => $this->image ? $this->image->storeAs($path, $this->image->getClientOriginalName(), 'public') : null,
            'note' => $this->note,
            'product_id' => $this->product_id,
            'card_type' => $this->card_type,
            'energy_generation' => $this->energy_generation,
            'battle_power' => $this->battle_power,
            'required_energy' => $this->required_energy,
            'action_point_cost' => $this->action_point_cost,
            'has_conditional_energy_generation' => $this->has_conditional_energy_generation ?? false,
            'has_raid' => $this->has_raid ?? false,
            'has_trigger' => $this->has_trigger ?? false,
            'trigger_effect' => $this->trigger_effect,
            'is_release_event_card' => $this->is_release_event_card ?? false, 
            'is_super_pre_release_card' => $this->is_super_pre_release_card ?? false,
            'is_rare_battle_card' => $this->is_rare_battle_card ?? false,
            'is_store_tournament_card' => $this->is_store_tournament_card ?? false,
            'is_judge_card' => $this->is_judge_card ?? false,
            'is_winner_card' => $this->is_winner_card ?? false,
            'is_alt_art_card' => $this->is_alt_art_card ?? false,
        ];

        //dd($values);

        Card::create($values);
        $this->resetForm();
        
        session()->flash('status', 'The card was successfully created!');
    }

    public function update(): void
    {
        $this->validate();

        $path = 'cards/'.Product::find($this->product_id)->product_code;
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0755, true, true);
        }

        $newImage = $this->image ? Storage::disk('public')->putFileAs($path, $this->image, $this->image->getClientOriginalName()) : $this->card->cover;

        if ($this->card->image && $this->card->image !== $newImage) {
            Storage::disk('public')->delete($this->card->image);
        }

        $values = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'color_type' => $this->color_type,
            'card_number' => $this->card_number,
            'image' => $newImage,
            'note' => $this->note,
            'product_id' => $this->product_id,
            'card_type' => $this->card_type,
            'energy_generation' => $this->energy_generation,
            'battle_power' => $this->battle_power,
            'required_energy' => $this->required_energy,
            'action_point_cost' => $this->action_point_cost,
            'has_conditional_energy_generation' => $this->has_conditional_energy_generation ?? false,
            'has_raid' => $this->has_raid ?? false,
            'has_trigger' => $this->has_trigger ?? false,
            'trigger_effect' => $this->trigger_effect,
            'is_release_event_card' => $this->is_release_event_card ?? false,
            'is_super_pre_release_card' => $this->is_super_pre_release_card ?? false,
            'is_rare_battle_card' => $this->is_rare_battle_card ?? false,
            'is_store_tournament_card' => $this->is_store_tournament_card ?? false,
            'is_judge_card' => $this->is_judge_card ?? false,
            'is_winner_card' => $this->is_winner_card ?? false,
            'is_alt_art_card' => $this->is_alt_art_card ?? false,
        ];

        //dd($values);

        $this->card->update($values);
        $this->resetForm();
        
        session()->flash('status', 'The card was successfully updated!');
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->component->dispatch('closeModal');
    }
}