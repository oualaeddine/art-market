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

/**
 * App\Modules\CategoriesLogic\Models\Category
 *
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_fr
 * @property int|null $is_active
 * @property string|null $icon
 * @property string|null $image
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read HomeCategory|null $home_category
 * @property-read Category|null $parent
 * @property-read Category|null $parent_1
 * @property-read Category|null $parent_2
 * @property-read Category|null $parent_3
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $sub_categories
 * @property-read int|null $sub_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Vendor[] $vendors
 * @property-read int|null $vendors_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 */
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
