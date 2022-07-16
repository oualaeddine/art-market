<?php

namespace App\Modules\OrdersLogic\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Modules\OrdersLogic\Models\Order_product
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $order_id
 * @property int $quantity
 * @property float|null $price
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Modules\OrdersLogic\Models\Order|null $order
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order_product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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


    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function instance():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }
}
