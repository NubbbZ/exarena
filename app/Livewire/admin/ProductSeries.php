<?php

namespace App\Livewire\admin;

use App\Livewire\admin\forms\ProductSeriesForm;
use App\Models\ProductSeries as Model_ProductSeries;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSeries extends Component
{
    use WithPagination;
    protected $pagenationTheme = 'bootstrap';

    public string $submitMethod;

    public ProductSeriesForm $form;

    public function render()
    {
        return view('livewire.admin.product-series', [
            'product_series' => Model_ProductSeries::paginate(10)
        ]);
    }

    public function set_update(Model_ProductSeries $product_series): void
    {
        $this->submitMethod = 'update';
        $this->form->setData($product_series);
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

    public function delete(Model_ProductSeries $product_series): void
    {
        $this->authorize('delete', $product_series);
        $product_series->delete();

        session()->flash('status', 'Series was successfully deleted!');
    }

    public function resetForm(): void
    {
        $this->form->resetForm();
    }
}
