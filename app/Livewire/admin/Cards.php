<?php

namespace App\Livewire\admin;

use App\Enums\CardColor;
use App\Enums\CardTriggerEffect;
use App\Enums\CardType;
use App\Livewire\admin\forms\CardForm;
use App\Models\Card;
use App\Models\ProductSeries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination, WithFileUploads;
    protected $pagenationTheme = 'bootstrap';

    public string $submitMethod;

    public CardForm $form;

    public function render()
    {
        return view('livewire.admin.cards', [
            'cards' => Card::paginate(10),
            'color_types' => CardColor::cases(),
            'card_types' => CardType::cases(),
            'product_series' => ProductSeries::all(),
            'trigger_effects' => CardTriggerEffect::cases()
        ]);
    }

    public function set_update(Card $card): void
    {
        $this->submitMethod = 'update';
        $this->form->setData($card);
        $this->dispatch('openModal');
    }

    public function set_create()
    {
        $this->submitMethod = 'create';
        $this->dispatch('openModal');
    }

    public function create(): void
    {
        $this->authorize('create', Auth::user());
        $this->form->create();
    }

    public function update(): void
    {
        $this->authorize('update', Auth::user());
        $this->form->update();
    }

    public function deleteImage(Card $card): void
    {
        $this->authorize('update', $card);
        if(Storage::disk('public')->exists($card->image) ) {
            Storage::disk('public')->delete($card->image);
        }
        $card->update([
            'image' => null
        ]);
    }

    public function delete(Card $card): void
    {
        $this->authorize('delete', $card);

        if($card->image && Storage::disk('public')->exists($card->image) ) {
            Storage::disk('public')->delete($card->image);
        }

        $card->delete();

        session()->flash('status', 'The card was successfully deleted!');
    }

    public function resetForm(): void
    {
        $this->form->resetForm();
    }
}
