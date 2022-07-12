<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public function orderProducts()
    {
        return $this->hasMany(RawOrderProduct::class, 'raw_order_id');
    }

    public function products()
    {
        return $this->hasMany(RawOrderProduct::class,'raw_order_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id')->withTrashed();
    }
}
