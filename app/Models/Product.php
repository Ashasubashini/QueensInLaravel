<?php

namespace App\Models;


use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'small_description',
        'large_description',
        'price',
        'quantity',
        'image'
    ];
}
