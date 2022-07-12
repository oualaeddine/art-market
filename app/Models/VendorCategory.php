<?php

namespace App\Models;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\VendorCategory
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $category_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|VendorCategory[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorCategory whereVendorId($value)
 * @mixin \Eloquent
 */
class VendorCategory extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }


    public function products()
    {
        return $this->belongsToMany(VendorCategory::class,'vendors_products_categories','category_id','product_id')->withTimestamps();
    }
}
