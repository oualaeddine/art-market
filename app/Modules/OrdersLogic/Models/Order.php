<?php

namespace App\Modules\OrdersLogic\Models;

use App\Models\User;
use App\Models\Vendor;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id')->withTrashed();
    }
}
