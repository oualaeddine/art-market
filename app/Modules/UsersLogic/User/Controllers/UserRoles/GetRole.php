<?php

namespace App\Modules\UsersLogic\User\Controllers\UserRoles;


use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetRole
{
    use AsAction;

    public function handle(User $user)
    {
       $roles = $user->getRoleNames();

       return $roles;
    }

    public function authorize()
    {
        return auth()->user()->can('edit_user_profile');
    }
}
