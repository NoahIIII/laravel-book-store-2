<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'description',
        'discount',
        'price',
        'category_id',
        'image',
        'stock',
        'number_of_pages',
        'status',
        'code',
        'price_after_discount',
        'bestseller',
    ];
}
