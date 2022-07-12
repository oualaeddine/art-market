<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\YalidineWilaya
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property YalidineMairie[] $yalidineMairies
 * @property string|null $name_ar
 * @property-read int|null $yalidine_mairies_count
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya query()
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YalidineWilaya whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class YalidineWilaya extends Model
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
    protected $fillable = ['name', 'created_at', 'updated_at','name_ar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yalidineMairies()
    {
        return $this->hasMany('App\Models\YalidineMairie', 'id_wilaya');
    }
}
