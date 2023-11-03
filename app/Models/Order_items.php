<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $table=['order_items'];
    protected $fillable = [
        'order_id',
        'book_id',
        'total',
        'total_after_discount',
        'status'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
