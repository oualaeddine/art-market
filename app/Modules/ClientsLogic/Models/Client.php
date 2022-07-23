<?php

namespace App\Modules\ClientsLogic\Models;

use App\Models\ClientsVendor;
use App\Models\YalidineMairie;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Modules\ClientsLogic\Models\Client
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone
 * @property string|null $wilaya
 * @property string|null $avatar
 * @property int|null $commune_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\ClientsLogic\Models\ClientAddress[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\ClientsLogic\Models\ClientAddress[] $client_address
 * @property-read int|null $client_address_count
 * @property-read \Illuminate\Database\Eloquent\Collection|ClientsVendor[] $clients_vendors
 * @property-read int|null $clients_vendors_count
 * @property-read YalidineMairie|null $commune
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\ClientsLogic\Models\Client_coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Query\Builder|Client onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Client permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCommuneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereWilaya($value)
 * @method static \Illuminate\Database\Query\Builder|Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Client withoutTrashed()
 * @mixin \Eloquent
 */
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
        return $this->hasMany(ClientAddress::class,'client_id')
            ->withExists('orders as has_orders')
            ;
    }

    public function clients_vendors()
    {
        return $this->hasMany(ClientsVendor::class,'client_id');
    }


}
