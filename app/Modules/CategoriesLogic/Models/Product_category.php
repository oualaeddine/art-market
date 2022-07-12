<?php

namespace App\Modules\CategoriesLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id'
    ];
}
