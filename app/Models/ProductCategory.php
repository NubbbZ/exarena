<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
