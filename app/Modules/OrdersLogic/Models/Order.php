<?php

namespace App\Modules\OrdersLogic\Models;

use App\Models\User;
use App\Models\Vendor;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Modules\OrdersLogic\Models\Order
 *
 * @property int $id
 * @property string|null $details
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $client
 * @property string|null $mode_payment
 * @property float $total
 * @property float $sub_total
 * @property int|null $address_id
 * @property int|null $updated_by
 * @property string|null $tracking_code
 * @property int $vendor_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read ClientAddress|null $address
 * @property-read Client|null $clientRelation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\OrdersLogic\Models\Order_product[] $orderProducts
 * @property-read int|null $order_products_count
 * @property-read Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereModePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereVendorId($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'status',
        'details',
        'mode_payment',
        'total',
        'sub_total',
        'updated_by',
        'client',
        'address_id',
        'tracking_code',
        'vendor_id'
    ];

    /*    public function product()
       {
           return $this->belongsTo(Product::class,'product_id');
       } */

    public function clientRelation()
    {
        return $this->belongsTo(Client::class, 'client')->withTrashed();

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by')->withTrashed();

    }

    public function address()
    {
        return $this->belongsTo(ClientAddress::class, 'address_id')->withTrashed();
    }


    public function orderProducts()
    {
        return $this->hasMany(Order_product::class, 'order_id');
    }

    public function products()
    {
        return $this->hasMany(Order_product::class, 'order_id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id')->withTrashed();
    }
}
