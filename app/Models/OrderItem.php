<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_item_id',
        'quantity',
        'unitprice',
        'totalprice',
        'product_id',
        'order_list_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderLists()
    {
        return $this->belongsTo(OrderList::class);
    }
}