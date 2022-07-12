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
