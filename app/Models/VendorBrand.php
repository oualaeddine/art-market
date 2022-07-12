<?php

namespace App\Models;

use App\Modules\BrandsLogic\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VendorBrand
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $brand_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|VendorBrand[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorBrand whereVendorId($value)
 * @mixin \Eloquent
 */
class VendorBrand extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }


    public function products()
    {
        return $this->belongsToMany(VendorBrand::class,'vendors_products_brands','brand_id','product_id')->withTimestamps();
    }
}
