<?php

namespace App\Livewire\admin\forms;

use App\Enums\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    #[Validate]
    public $id, $name, $product_code, $cover, $note, $product_series_id, $product_category;

    public function rules()
    {
        return [
            'name' => [
                'required', 
                'string', 
                'max:255'
            ],
            'product_code' => [
                'nullable', 
                'string', 
                'max:255', 
                'unique:products,product_code,'.$this->id
            ],
            'cover' => [
                'nullable:image',
                'max:2048'
            ],
            'note' => [
                'nullable', 
                'string'
            ],
            'product_series_id' => [
                'required', 
                'integer'
            ],
            'product_category' => [
                'required', 
                Rule::enum(ProductCategory::class)
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setData (Product $product)
    {
        $this->product = $product;
        $this->fill(
            $product->only([
                'id', 
                'name',
                'product_code',
                'note',
                'product_series_id',
                'product_category'
            ]), 
        );
    }
    
    public function create(): void
    {
        $this->validate();
        
        Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'product_code' => $this->product_code,
            'cover' => $this->cover ? $this->cover->storeAs('products/covers', $this->cover->getClientOriginalName(), 'public') : null,
            'note' => $this->note,
            'product_series_id' => $this->product_series_id,
            'product_category' => $this->product_category
        ]);
        $this->resetForm();
        
        session()->flash('status', 'The product was successfully created!');
    }

    public function update(): void
    {
        $this->validate();

        $newCover = $this->cover ? Storage::disk('public')->putFileAs('products/covers', $this->cover, $this->cover->getClientOriginalName()) : $this->product->cover;

        if ($this->product->cover && $this->product->cover !== $newCover) {
            Storage::disk('public')->delete($this->product->cover);
        }

        $this->product->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'product_code' => $this->product_code,
            'cover' => $newCover,
            'note' => $this->note,
            'product_series_id' => $this->product_series_id,
            'product_category' => $this->product_category
        ]);
        $this->resetForm();
        
        session()->flash('status', 'The product was successfully updated!');
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->component->dispatch('closeModal');
    }
}