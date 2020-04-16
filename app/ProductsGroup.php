<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsGroup extends Model
{
    //
    protected $fillable = ['name', 'price'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
