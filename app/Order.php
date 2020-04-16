<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    //
    protected $fillable = [
        'number',
        'provider_id',
        'user_id',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiced');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(OrdersProduct::class)
            ->withPivot([
                'quantity',
                'price'
            ]);
    }
}
