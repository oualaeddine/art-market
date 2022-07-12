<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions;



use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdatePermission
{
    use AsAction;

    public function handle(ActionRequest $request,Permission $permission)
    {
//        $permission->update($request->only('name'));
    }


    public function rules(): array
    {

        return [
            'name' => ['required', Rule::unique('permissions','name')->ignore(request()->permission->id)],
        ];
    }

    public function asController(ActionRequest $request,Permission $permission)
    {
//        $this->handle($request,$permission);
        Session::flash('success','Permission mis à jour avec succès');
        return redirect()->back();
    }

    public function authorize()
    {
        return auth()->user()->can('edit_permission');
    }
}
