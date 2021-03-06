<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'code',
        'email',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
