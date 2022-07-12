<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VendorsProductsCategory
 *
 * @property int $id
 * @property int $category_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VendorsProductsCategory extends Model
{
    use HasFactory;
}
