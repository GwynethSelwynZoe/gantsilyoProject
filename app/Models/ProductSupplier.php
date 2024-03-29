<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    protected $fillable = [
        'prod_supplier_id',
        'date_supplied',
        'prod_price',
        'product_id',
        'supplier_id',
        // other fillable fields
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}