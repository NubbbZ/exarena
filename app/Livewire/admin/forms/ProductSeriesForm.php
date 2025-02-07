<?php

namespace App\Livewire\admin\forms;

use App\Models\ProductSeries;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\Form;

class ProductSeriesForm extends Form
{
    public ?ProductSeries $product_series;

    #[Validate]
    public $id, $name, $codename, $release_date;

    public function rules()
    {
        return [
            'name' => [
                'required', 
                'string', 
                'unique:product_series,name,'.$this->id
            ],
            'codename' => [
                'required', 
                'string', 
                'unique:product_series,codename,'.$this->id
            ],
            'release_date' => [
                'nullable', 
                'date'
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setData (ProductSeries $product_series)
    {
        $this->product_series = $product_series;
        $this->fill(
            $product_series->only([
                'id', 
                'name',
                'codename',
                'release_date'
            ]), 
        );
    }
    
    public function create(): void
    {
        $this->validate();
        
        ProductSeries::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'codename' => $this->codename,
            'release_date' => $this->release_date
        ]);
        $this->resetForm();
        
        session()->flash('status', 'Series was successfully created!');
    }

    public function update(): void
    {
        //dd($this->release_date);

        $this->validate();
        
        $this->product_series->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'codename' => $this->codename,
            'release_date' => $this->release_date
        ]);
        $this->resetForm();
        
        session()->flash('status', 'Series was successfully updated!');
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->component->dispatch('closeModal');
    }
}