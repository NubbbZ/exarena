<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardAffinity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'product_series_id',
    ];

    public function ProductSeries ()
    {
        return $this->belongsTo(ProductSeries::class);
    }

    public function Cards ()
    {
        return $this->belongsToMany(Card::class);
    }
}
