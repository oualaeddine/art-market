<?php

namespace App\Modules\ClientsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\ClientsLogic\Models\Client_wallet
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_wallet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Client_wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'amount',
    ];
    
}
