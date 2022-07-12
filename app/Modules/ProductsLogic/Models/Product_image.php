<?php

namespace App\Modules\ProductsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\ProductsLogic\Models\Product_image
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Modules\ProductsLogic\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',  
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
}
