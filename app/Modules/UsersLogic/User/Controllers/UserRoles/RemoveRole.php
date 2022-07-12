<?php

namespace App\Modules\UsersLogic\User\Controllers\UserRoles;


use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class RemoveRole
{
    use AsAction;

    public function handle(User $user ,string $role)
    {
        $user->removeRole($role);
    }

    public function authorize()
    {
        return auth()->user()->can('edit_user_profile');
    }
}
