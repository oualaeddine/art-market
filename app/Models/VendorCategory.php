<?php

namespace App\Models;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
