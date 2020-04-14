<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'number',
        'provider_id',
        'user_id',
    ];
}
