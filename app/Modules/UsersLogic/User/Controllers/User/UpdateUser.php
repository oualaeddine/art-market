<?php

namespace App\Modules\UsersLogic\User\Controllers\User;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUser
{
    use AsAction;

    public function handle(ActionRequest $request, User $user)
    {

        $user->update($this->getUserFields($request));
        $user->roles()->sync($request->roles);

        if ($request->password != null) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        Session::flash('message', 'Utilisateur mis à jour avec succés');

        return redirect()->route('admin.users.index');
    }

    private function getUserFields($request): array
    {
        return $request->only(['name', 'family_name', 'user_name', 'email', 'phone','observation']);
    }

    public function rules(): array
    {

        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required','unique:vendor_users', 'email',Rule::unique('users')->where(function ($query) {
                                                return $query->where('email', request()->email);
                                            })->ignore(request()->user) ],
            'password' => ['nullable', 'confirmed', 'string', 'min:8'],
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
        return auth()->user()->can('edit_user_profile');
    }
}
