<?php

namespace App\Models;


use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOffer extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
