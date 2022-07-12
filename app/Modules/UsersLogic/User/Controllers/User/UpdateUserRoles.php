<?php

namespace App\Modules\UsersLogic\User\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUserRoles
{
    use AsAction;

    public function handle(ActionRequest $request, User $user)
    {

        $user->roles()->sync($request->roles);

        Session::flash('message', 'Utilisateur mis à jour avec succés');

        return redirect()->route('admin.users.index');
    }


    public function rules(): array
    {

        return [
            'roles'=>['required','array']
        ];
    }
    public function authorize()
    {
        return auth()->user()->can('edit_user_profile');
    }

}
