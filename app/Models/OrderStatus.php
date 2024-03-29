<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = [
        'status_id',
        'status_desc'
    ];

    public function orderLists()
    {
        return $this->hasMany(OrderList::class);
    }
}
