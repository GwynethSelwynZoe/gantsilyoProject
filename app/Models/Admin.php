<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'un',
        'pw',
        'email',
        'contactno',
        'img',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}