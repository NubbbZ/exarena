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
}
