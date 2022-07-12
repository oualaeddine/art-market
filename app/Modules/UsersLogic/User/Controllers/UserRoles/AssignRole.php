<?php

namespace App\Modules\UsersLogic\User\Controllers\UserRoles;


use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignRole
{
    use AsAction;

    public function handle(User $user ,string $role)
    {
        $user->assignRole($role);
    }

    public function authorize()
    {
        return auth()->user()->can('create_user');
    }
}
