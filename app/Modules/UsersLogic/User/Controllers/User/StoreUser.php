<?php

namespace App\Modules\UsersLogic\User\Controllers\User;


use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreUser
{
    use AsAction;


    public function handle(ActionRequest $request)
    {

        $user = User::create($this->getUserFields($request) + ['password' => Hash::make($request->password)]);

        $user->roles()->attach($request->roles);
        Session::flash('message', 'Utilisateur ajouté avec succès');
        return redirect()->route('admin.users.index');


    }

    private function getUserFields($request): array
    {
        return $request->only(['name', 'email']);
    }

    public function rules(): array
    {

        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users','unique:vendor_users'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
            'roles' => ['required', 'array'],
            'roles.*' => ['required', 'exists:roles,id']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name' => 'nom',
            'email' => 'émail',
            'password' => 'mot de passe',
            'roles' => 'rôles'
        ];
    }

    public function authorize()
    {
        return auth()->user()->can('create_user');
    }


}
