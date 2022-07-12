<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions;


use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddPermission
{
    use AsAction;

    public function handle(ActionRequest $request)
    {
//        Permission::create(['name' => $request->name]);
    }


    public function rules()
    {

//        return [
//            'name' => ['required', 'unique:permissions'],
//        ];
    }

    public function asController(ActionRequest $request)
    {
//        $this->handle($request);
//        Session::flash('success','Permission ajouté avec succès');
//        return redirect()->back();
    }
}
