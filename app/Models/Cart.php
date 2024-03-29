<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'cart_id',
        'qty',
        'total_price',
        'customer_id',
         'product_id'
        ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
