<?php

namespace App\Models;

use App\Modules\BrandsLogic\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
