<?php

namespace App\Livewire\admin;

use App\Livewire\admin\forms\ProductCategoryForm;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategories extends Component
{
    use WithPagination;
    protected $pagenationTheme = 'bootstrap';

    public string $submitMethod;

    public ProductCategoryForm $form;

    public function render()
    {
        return view('livewire.admin.product-categories', [
            'categories' => ProductCategory::paginate(10)
        ]);
    }

    public function set_update(ProductCategory $product_category): void
    {
        $this->submitMethod = 'update';
        $this->form->setData($product_category);
    }

    public function set_create()
    {
        $this->submitMethod = 'create';
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

    public function delete(ProductCategory $product_category): void
    {
        $this->authorize('delete', $product_category);
        $product_category->delete();

        session()->flash('status', 'Publisher was successfully deleted!');
    }

    public function resetForm(): void
    {
        $this->form->resetForm();
    }
}
