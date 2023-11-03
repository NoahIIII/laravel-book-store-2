<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_items extends Model
{
    use HasFactory;
    protected $table='cart_items';
    protected $fillable = [
        'user_id',
        'book_id',
        'price',
        'quantity',
        'cart_id'
    ];
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
