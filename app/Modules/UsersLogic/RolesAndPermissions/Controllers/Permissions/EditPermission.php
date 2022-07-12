<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions;



use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditPermission
{
    use AsAction;

    public function handle(Permission $permission)
    {
        return[
            'name'=>$permission->name
        ];
    }
    public function authorize()
    {
        return auth()->user()->can('edit_permission');
    }

}
