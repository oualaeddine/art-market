<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers;


use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class RevokeRolePermissions
{
    use AsAction;

    public function handle(ActionRequest $request, Role $role)
    {
        foreach ($request->permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
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
