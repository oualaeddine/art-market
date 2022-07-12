<?php

namespace App\Modules\PendingPointsLogic\Models;

use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Modules\PendingPointsLogic\Models\ClientPendingPoint
 *
 * @property-read Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPendingPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPendingPoint newQuery()
 * @method static \Illuminate\Database\Query\Builder|ClientPendingPoint onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPendingPoint query()
 * @method static \Illuminate\Database\Query\Builder|ClientPendingPoint withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ClientPendingPoint withoutTrashed()
 * @mixin \Eloquent
 */
class ClientPendingPoint extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'client_id',
        'status',
        'amount',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
