<?php

namespace App\Modules\CategoriesLogic\Models;

use App\Models\HomeCategory;
use App\Models\Vendor;
use App\Models\VendorCategory;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_fr',
        'is_active',
        'icon',
        'image',
        'parent_id'
    ];

//    public function products()
//    {
//
//        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id')
//            ->where('is_active',1)
//            ;
//
//    }


    public function products()
    {
        return $this->belongsToMany(Product::class,'vendors_products_categories','category_id','product_id')->withTimestamps();
    }



    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_categories', 'category_id', 'vendor_id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function parent_1()
    {
        return $this->belongsTo(Category::class,'parent_id')->where('is_active',1);
    }


    public function parent_2()
    {
        return $this->belongsTo(Category::class,'parent_id')->where('is_active',1);
    }

    public function parent_3()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function home_category()
    {
        return $this->hasOne(HomeCategory::class,'category_id');

    }


    public function sub_categories()
    {
        return $this->hasMany(Category::class,'parent_id','id')->where('is_active',1)->with('sub_categories');

    }

}
