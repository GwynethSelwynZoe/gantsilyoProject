<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id', 
        'prodname',
        'prod_desc',
        'type',
        'price',
        'img'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function suppliers()
    {
        return $this->hasMany(ProductSupplier::class, 'product_id', 'product_id');
    }
}
