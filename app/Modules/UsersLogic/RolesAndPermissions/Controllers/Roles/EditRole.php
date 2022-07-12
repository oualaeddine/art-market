<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles;



use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class EditRole
{
    use AsAction;

    public function handle(Role $role)
    {
        return[
            'name'=>$role->name,
            'perms'=>$role->permissions()->get()->pluck('id')->toArray()
        ];
    }

    public function authorize()
    {
        return auth()->user()->can('edit_role');
    }

}
