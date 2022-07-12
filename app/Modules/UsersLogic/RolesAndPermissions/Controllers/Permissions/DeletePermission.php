<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions;



use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeletePermission
{
    use AsAction;

    public function handle(Permission $permission)
    {
        $permission->forceDelete();
    }

    public function asController(ActionRequest $request,Permission $permission)
    {
        $this->handle($permission);
        Session::flash('success','Permission supprimé avec succès');
        return redirect()->back();
    }

    public function authorize()
    {
        return auth()->user()->can('delete_permission');
    }
}
