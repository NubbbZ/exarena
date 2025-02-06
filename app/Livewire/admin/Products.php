<?php

namespace App\Livewire\admin;

use App\Livewire\admin\forms\ProductForm;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination, WithFileUploads;
    protected $pagenationTheme = 'bootstrap';

    public string $submitMethod;

    public ProductForm $form;

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::paginate(10),
            'product_categories' => ProductCategory::all()
        ]);
    }

    public function set_update(Product $product): void
    {
        $this->submitMethod = 'update';
        $this->form->setData($product);
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

    public function deleteCover(Product $product): void
    {
        $this->authorize('update', $product);
        if(Storage::disk('public')->exists($product->cover) ) {
            Storage::disk('public')->delete($product->cover);
        }
        $product->update([
            'cover' => null
        ]);
    }

    public function delete(Product $product): void
    {
        $this->authorize('delete', $product);

        if($product->cover && Storage::disk('public')->exists($product->cover) ) {
            Storage::disk('public')->delete($product->cover);
        }
        $product->delete();

        session()->flash('status', 'The product was successfully deleted!');
    }

    public function resetForm(): void
    {
        $this->form->resetForm();
    }
}
