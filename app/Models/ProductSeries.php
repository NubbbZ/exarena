<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSeries extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'codename',
        'release_date',
    ];

    public function Products ()
    {
        return $this->hasMany(Product::class, 'product_series_id');
    }
}
