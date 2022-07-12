<?php

namespace App\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawOrderProduct extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function order()
    {
        return $this->belongsTo(RawOrder::class,'raw_order_id');
    }
}
