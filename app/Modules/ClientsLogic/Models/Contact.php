<?php

namespace App\Modules\ClientsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'phone',
        'name',
        'status',
        'message',
        'comment'
    ];

    protected $guarded=[];
}
