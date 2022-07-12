<?php

namespace App\Models;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

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
}
