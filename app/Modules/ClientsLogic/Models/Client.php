<?php

namespace App\Modules\ClientsLogic\Models;

use App\Models\ClientsVendor;
use App\Models\YalidineMairie;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable
{
    use HasFactory,SoftDeletes,HasRoles;


    protected $fillable=[
        'first_name',
        'last_name',
        'commune_id',
        'wilaya',
        'phone',
        'avatar',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function commune()
    {
        return $this->belongsTo(YalidineMairie::class,'commune_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'client');
    }

    public function coupons()
    {
        return $this->hasMany(Client_coupon::class,'client_id');
    }


    public function client_address()
    {
        return $this->hasMany(ClientAddress::class,'client_id');
    }

    public function addresses()
    {
        return $this->hasMany(ClientAddress::class,'client_id');
    }

    public function clients_vendors()
    {
        return $this->hasMany(ClientsVendor::class,'client_id');
    }


}
