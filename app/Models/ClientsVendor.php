<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientsVendor
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientsVendor whereVendorId($value)
 * @mixin \Eloquent
 */
class ClientsVendor extends Model
{

    protected $table='vendors_clients';
    use HasFactory;
    protected $guarded=[];
}
