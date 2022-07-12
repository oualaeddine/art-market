<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VendorsProductsBrand
 *
 * @property int $id
 * @property int $brand_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsProductsBrand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VendorsProductsBrand extends Model
{
    use HasFactory;
}
