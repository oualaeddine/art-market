<?php

namespace App\Modules\ProductsLogic\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\ProductsLogic\Models\Product_brand
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product_brand extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'brand_id'
    ];

 
}
