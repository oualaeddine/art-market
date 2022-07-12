<?php

namespace App\Modules\OrdersLogic\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];

    /**
     * @return BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
}
