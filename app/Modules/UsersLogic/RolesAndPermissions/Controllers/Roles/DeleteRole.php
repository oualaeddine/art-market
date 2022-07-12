<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class DeleteRole
{
    use AsAction;

    public function handle(Role $role)
    {
        $role_exist = DB::table('model_has_roles')->where('role_id',$role->id)->first();

        if(! $role_exist && !in_array($role->id,[1,2,3])){
            $role->deleteOrFail();
            return ['success' => true];
        }else{

            return ['success' =>false , 'message' => 'Rôle déjà utilisé, vous ne pouvez pas le supprimer'];

        }

    }


    public function asController(Role $role)
    {
        $status = $this->handle($role);

        if($status['success'] == true){

            Session::flash('success','Rôle supprimé avec succés');
            return redirect()->back();

        }else{

            Session::flash('error',$status['message']);
            return redirect()->back();

        }
    }

    public function authorize()
    {
        return auth()->user()->can('delete_role');
    }
}
