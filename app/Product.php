<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'number',
        'client_id',
        'user_id',
        'products_group_id',
        'provider_id',
        'price',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function group()
    {
        return $this->belongsTo(ProductsGroup::class);
    }
}
