<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quote : Devis
 * @package App
 */
class Quote extends Model
{
    //
    protected $fillable = [
        'number',
        'client_id',
        'user_id',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiced');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(QuotesProduct::class)
            ->withPivot([
                'quantity',
                'price'
            ]);
    }
}
