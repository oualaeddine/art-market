<?php

namespace App\Modules\ClientsLogic\Models;


use App\Models\YalidineMairie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
