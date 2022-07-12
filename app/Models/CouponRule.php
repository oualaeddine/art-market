<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponRule
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CouponRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponRule query()
 * @mixin \Eloquent
 */
class CouponRule extends Model
{
    protected $table='coupons_rules';
    use HasFactory;
    protected $fillable=[
        'min',
        'max',
        'points',
    ];
}
