<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRole
{
    use AsAction;

    public function handle(ActionRequest $request)
    {
        $admin_roles=64;
        $vendor_roles=65;
       $role= Role::create(['name' => $request->name]);
       $role->syncPermissions($request->permissions);
    }

    public function asController(ActionRequest $request)
    {
        $permissions=Permission::query()->find($request->permissions);
        if ($permissions->contains('guard_name','vendor') && $permissions->contains('guard_name','web')){
            Session::flash('error',"veuillez vous assurer que toutes les autorisations appartiennent uniquement à l'administrateur ou au vendeur");

            return  redirect()->back()->withInput();
        }
        $this->handle($request);
        Session::flash('success','Rôle ajouté avec succès');
        return redirect()->back();
    }

    public function rules(): array
    {

        return [
            'name' => ['required', 'unique:roles'],
            'permissions'=>['required','array']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name' => 'nom',
        ];
    }
    public function authorize()
    {
        return auth()->user()->can('create_role');
    }
}
