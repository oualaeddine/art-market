<?php

namespace App\Modules\ClientsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'amount',
    ];
    
}
