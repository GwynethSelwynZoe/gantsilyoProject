<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_id',
        'name',
        'email',
        'contactno',
        'img'
    ];

    public function products()
    {
        return $this->hasMany(ProductSupplier::class, 'supplier_id');
    }
}