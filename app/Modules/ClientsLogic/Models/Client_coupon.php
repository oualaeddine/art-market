<?php

namespace App\Modules\ClientsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Modules\ClientsLogic\Models\Client_coupon
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $coupon
 * @property float|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon newQuery()
 * @method static \Illuminate\Database\Query\Builder|Client_coupon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereCoupon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client_coupon whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Client_coupon withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Client_coupon withoutTrashed()
 * @mixin \Eloquent
 */
class Client_coupon extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'client_id',
        'coupon',
        'value',
        'is_active',
    ];

}
