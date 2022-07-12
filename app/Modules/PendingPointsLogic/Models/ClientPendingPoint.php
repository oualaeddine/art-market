<?php

namespace App\Modules\PendingPointsLogic\Models;

use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
