<?php

namespace App\Modules\UsersLogic\User\Controllers\User;


use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class EditUser
{
    use AsAction;

    public function handle(User $user)
    {
        return  $user;

    }

    public function jsonResponse(User $user): \Illuminate\Http\JsonResponse
    {
        $categories_selected = $user->roles->pluck('id');

        return \response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'list_roles' => $categories_selected
        ]);
    }

    public function authorize()
    {
        return auth()->user()->can('edit_user_profile');
    }
}
