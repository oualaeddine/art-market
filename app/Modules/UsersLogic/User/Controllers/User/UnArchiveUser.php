<?php

namespace App\Modules\UsersLogic\User\Controllers\User;



use App\Models\User;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class UnArchiveUser
{
    use AsAction;

    public function handle(User $user)
    {
        abort_if(auth()->id() == $user->id,401);

        $user->restore();
        Session::flash('message','Utilisateur désarchivé avec succès');
        return redirect()->back();

    }

    public function authorize()
    {
        return auth()->user()->can('archive_user');
    }
}
