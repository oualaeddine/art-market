<?php

namespace App\Models;

use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_wilaya
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property YalidineWilaya $yalidineWilaya
 */
class YalidineMairie extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_wilaya', 'name', 'created_at', 'updated_at','name_ar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yalidineWilaya()
    {
        return $this->belongsTo('App\Models\YalidineWilaya', 'id_wilaya');
    }
    public function wilaya()
    {
        return $this->belongsTo('App\Models\YalidineWilaya', 'id_wilaya');
    }


    public function clients()
    {
        return $this->hasMany(Client::class,'commune_id');
    }



}
