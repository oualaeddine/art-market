<?php

namespace App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles;



use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class UpdateRole
{
    use AsAction;

    public function handle(ActionRequest $request,Role $role)
    {
        $role->update($request->only('name'));
        $role->syncPermissions($request->permissions);

    }


    public function asController(ActionRequest $request,Role $role)
    {
        $this->handle($request,$role);
        Session::flash('success','Rôle mis à jour avec succès');
        return redirect()->back();
    }



    public function rules(): array
    {

        return [
            'name' => ['required', Rule::unique('roles','name')->ignore(request()->role->id)],
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
        return auth()->user()->can('edit_role');
    }
}
