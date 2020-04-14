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
    ];
}
