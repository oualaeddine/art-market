<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClientPasswordReset
 *
 * @property string $phone
 * @property string $token
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientPasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class ClientPasswordReset extends Model
{
    use HasFactory;
}
