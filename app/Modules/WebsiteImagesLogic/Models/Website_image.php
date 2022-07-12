<?php

namespace App\Modules\WebsiteImagesLogic\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'main_title',
        'title',
        'sub_title',
        'image',
        'product_id',
        'lang',
        'is_active',
        'type',
        'link'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','slug');
    }

}
