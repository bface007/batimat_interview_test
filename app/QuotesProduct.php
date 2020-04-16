<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuotesProduct extends Pivot
{
    //
    protected $fillable = ['quantity', 'price'];
}
