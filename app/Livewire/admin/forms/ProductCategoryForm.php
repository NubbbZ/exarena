<?php

namespace App\Livewire\admin\forms;

use App\Models\ProductCategory;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\Form;

class ProductCategoryForm extends Form
{
    public ?ProductCategory $product_category;

    #[Validate]
    public $id, $name;

    public function rules()
    {
        return [
            'name' => [
                'required', 
                'string', 
                'max:255', 
                'unique:product_categories,name'
            ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setData (ProductCategory $product_category)
    {
        $this->product_category = $product_category;
        $this->fill(
            $product_category->only([
                'id', 
                'name'
            ]), 
        );
    }
    
    public function create(): void
    {
        $this->validate();
        
        ProductCategory::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
        $this->resetForm();
        
        session()->flash('status', 'Product Category was successfully created!');
    }

    public function update(): void
    {
        $this->validate();
        
        $this->product_category->update([
            'name' => $this->name
        ]);
        $this->resetForm();
        
        session()->flash('status', 'Product Category was successfully updated!');
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->component->dispatch('closeModal');
    }
}