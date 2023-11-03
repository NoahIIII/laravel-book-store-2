<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table=['invoices'];
    protected $fillable = [
        'order_id',
        'fname',
        'lname',
      'address',
      'total',
      'phone',
      'city',
      'email',
      'note',
      'created_at',
      'updated_at'
      ];
}
