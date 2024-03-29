<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_list_id',
        'order_date',
        'customer_id',
        'status_id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}