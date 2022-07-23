<?php

namespace App\Modules\ClientsLogic\Models;


use App\Models\YalidineMairie;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Modules\ClientsLogic\Models\ClientAddress
 *
 * @property int $id
 * @property string $address
 * @property int $commune_id
 * @property int $client_id
 * @property string|null $code_postal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read YalidineMairie $commune
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newQuery()
 * @method static \Illuminate\Database\Query\Builder|ClientAddress onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCodePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCommuneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ClientAddress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ClientAddress withoutTrashed()
 * @mixin \Eloquent
 */
class ClientAddress extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'address',
        'commune_id',
        'code_postal',
        'client_id'
    ];

    public function commune()
    {
        return $this->belongsTo(YalidineMairie::class, 'commune_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'address_id');
    }
}
