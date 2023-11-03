<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];
    // function cart_item(){
    //     return $this->hasMany(Cart_items::class);
    // }
}
