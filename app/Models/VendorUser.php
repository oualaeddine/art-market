<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\VendorUser
 *
 * @property int $id
 * @property int $vendor_id
 * @property string|null $phone
 * @property string|null $email
 * @property string $password
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorUser whereVendorId($value)
 * @mixin \Eloquent
 */
class VendorUser extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = [];
    protected $guard = 'vendor';

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
