<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class AssignPermissionsToRole
{
    use AsAction;

    public function handle(ActionRequest $request, Role $role)
    {
//        exp:permission1 or id
        $role->syncPermissions($request->permissions);
    }


    public function rules(): array
    {

        return [
            'permissions' => ['required'],
        ];
    }

    public function authorize()
    {
        return auth()->user()->can('create_role');
    }
}
