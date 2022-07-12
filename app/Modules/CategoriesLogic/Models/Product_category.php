<?php

namespace App\Modules\CategoriesLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\CategoriesLogic\Models\Product_category
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product_category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id'
    ];
}
