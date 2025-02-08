<?php

namespace App\Models;

use App\Enums\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    public $casts = [
        'product_category' => ProductCategory::class
    ];

    protected $fillable = [
        'name',
        'slug',
        'product_code',
        'cover',
        'note',
        'product_series_id',
        'product_category',
    ];

    public function ProductSeries ()
    {
        return $this->belongsTo(ProductSeries::class);
    }

    public function ProductCategory ()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
