<?php

namespace App\Models;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Vendor
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $desc_ar
 * @property string|null $short_dec_ar
 * @property string|null $logo_ar
 * @property string|null $name_fr
 * @property string|null $desc_fr
 * @property string|null $short_dec_fr
 * @property string|null $logo_fr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $is_active
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $active_products
 * @property-read int|null $active_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Brand[] $brands
 * @property-read int|null $brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VendorImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VendorUser[] $vendors
 * @property-read int|null $vendors_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Query\Builder|Vendor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDescAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDescFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereLogoAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereLogoFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereNameFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereShortDecAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereShortDecFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Vendor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vendor withoutTrashed()
 * @mixin \Eloquent
 */
class Vendor extends Model
{
    use HasFactory, HasRoles,SoftDeletes;

    protected $guarded = [];

    public function vendors(): HasMany
    {
        return $this->hasMany(VendorUser::class, 'vendor_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(VendorImage::class, 'vendor_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'vendor_id');
    }

    public function active_products(): HasMany
    {
        return $this->hasMany(Product::class,'vendor_id')
            ->where('is_active','=',1)
            ;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'vendor_categories', 'vendor_id', 'category_id')
            ->withPivot([
                'id',
                'is_active'
            ])
            ->withTimestamps()
            ;
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'vendor_brands', 'vendor_id', 'brand_id')
            ->withPivot([
                'id',
                'is_active'
            ])
            ->withTimestamps()
            ;
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'vendor_id');
    }
}
