<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
        'number',
    ];

    public function invoiced()
    {
        return $this->morphTo();
    }
}
