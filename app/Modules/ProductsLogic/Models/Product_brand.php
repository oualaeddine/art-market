<?php

namespace App\Modules\ProductsLogic\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_brand extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'brand_id'
    ];

 
}
