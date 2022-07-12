<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsVendor extends Model
{

    protected $table='vendors_clients';
    use HasFactory;
    protected $guarded=[];
}
