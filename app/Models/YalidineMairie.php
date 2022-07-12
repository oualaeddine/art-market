<?php

namespace App\Models;

use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\YalidineMairie
 *
 * @property integer $id
 * @property integer $id_wilaya
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property YalidineWilaya $yalidineWilaya
 * @property string|null $name_ar
 * @property-read \Illuminate\Database\Eloquent\Collection|Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\YalidineWilaya $wilaya
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie query()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereIdWilaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineMairie whereUpdatedAt($value)
 * @mixin \Eloquent
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
