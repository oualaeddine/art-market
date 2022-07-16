<?php

namespace App\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RawOrderProduct
 *
 * @property int $id
 * @property float|null $price
 * @property int|null $qty
 * @property int|null $raw_order_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RawOrder|null $order
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereRawOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RawOrderProduct extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function instance()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function order()
    {
        return $this->belongsTo(RawOrder::class,'raw_order_id');
    }
}
