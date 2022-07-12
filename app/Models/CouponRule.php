<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
