<?php

namespace App\Modules\ClientsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
