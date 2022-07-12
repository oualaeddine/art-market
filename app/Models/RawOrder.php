<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\RawOrder
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $phone
 * @property string|null $wilaya
 * @property string|null $commune
 * @property string $status
 * @property float $sub_total
 * @property float $total
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $mode_payment
 * @property string|null $tracking_code
 * @property int $vendor_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RawOrderProduct[] $orderProducts
 * @property-read int|null $order_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RawOrderProduct[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|RawOrder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereCommune($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereModePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawOrder whereWilaya($value)
 * @method static \Illuminate\Database\Query\Builder|RawOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RawOrder withoutTrashed()
 * @mixin \Eloquent
 */
class RawOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public function orderProducts()
    {
        return $this->hasMany(RawOrderProduct::class, 'raw_order_id');
    }

    public function products()
    {
        return $this->hasMany(RawOrderProduct::class,'raw_order_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id')->withTrashed();
    }
}
