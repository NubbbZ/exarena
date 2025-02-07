<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'product_code',
        'cover',
        'note',
        'product_series_id',
        'product_category_id',
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
