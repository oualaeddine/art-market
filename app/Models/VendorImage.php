<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VendorImage
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $img_ar
 * @property string|null $img_fr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $vendor_id
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereImgAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereImgFr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorImage whereVendorId($value)
 * @mixin \Eloquent
 */
class VendorImage extends Model
{
    use HasFactory;

    protected $guarded=[];
}
