<?php

namespace App\Modules\BrandsLogic\Models;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_fr',
        'image',
        'is_active'
    ];



    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_brands', 'brand_id', 'vendor_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'vendors_products_brands','brand_id','product_id')->withTimestamps();
    }


}
