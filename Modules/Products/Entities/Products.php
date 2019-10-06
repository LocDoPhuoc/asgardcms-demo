<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products__products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];
}
