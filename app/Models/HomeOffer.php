<?php

namespace App\Models;


use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HomeOffer
 *
 * @property int $id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
