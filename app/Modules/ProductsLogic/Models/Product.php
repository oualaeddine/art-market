<?php

namespace App\Modules\ProductsLogic\Models;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Modules\ProductsLogic\Models\Product
 *
 * @property int $id
 * @property string|null $name_fr
 * @property string|null $name_ar
 * @property string|null $desc_ar
 * @property string|null $desc_fr
 * @property string|null $image
 * @property string|null $ref
 * @property float|null $price_old
 * @property float|null $price
 * @property float|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $rating
 * @property string|null $slug
 * @property int $is_active
 * @property int $vendor_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property float|null $shipping
 * @property-read \Illuminate\Database\Eloquent\Collection|Brand[] $brands
 * @property-read int|null $brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\ProductsLogic\Models\Product_image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Order_product[] $orderProduct
 * @property-read int|null $order_product_count
 * @property-read Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVendorId($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_ar',
        'desc_ar',
        'desc_fr',
        'discount',
        'price_old',
        'price',
        'image',
        'ref',
        'rating',
        'slug',
        'is_active',
        'vendor_id',
        'shipping'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'vendors_products_categories','product_id','category_id')->withTimestamps();
    }


    public function brands()
    {
        return $this->belongsToMany(Brand::class,'vendors_products_brands','product_id','brand_id')->withTimestamps();
    }


    public function images()
    {
        return $this->hasMany(Product_image::class,'product_id');
    }


    public function orderProduct()
    {
        return $this->hasMany(Order_product::class, 'product_id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

}
