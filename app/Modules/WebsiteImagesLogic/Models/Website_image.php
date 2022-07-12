<?php

namespace App\Modules\WebsiteImagesLogic\Models;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\WebsiteImagesLogic\Models\Website_image
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $main_title
 * @property string|null $title
 * @property string|null $sub_title
 * @property string|null $image
 * @property string $lang
 * @property int $is_active
 * @property string $type
 * @property string|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $link
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereMainTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website_image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
