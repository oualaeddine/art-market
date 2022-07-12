<?php

namespace App\Modules\UsersLogic\User\Controllers\User;


use App\Models\User;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteUser
{
    use AsAction;

    public function handle(User $user)
    {
//        remove user from table directly
        $user->forceDelete();
        Session::flash('message','Utilisateur supprimé avec succès');
        return redirect()->back();

    }

    public function authorize()
    {
        return auth()->user()->can('delete_user');
    }
}
