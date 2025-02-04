<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'product_category_id',
    ];

    public function ProductCategory ()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
