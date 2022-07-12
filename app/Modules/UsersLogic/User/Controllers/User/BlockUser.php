<?php

namespace App\Modules\UsersLogic\User\Controllers\User;


use App\Models\User;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class BlockUser
{
    use AsAction;

    public function handle(User $user)
    {
        abort_if(auth()->id() == $user->id,401);

        // add is_blocked

        $user->update([
            'blocked_at' => now()
        ]);


        Session::flash('message','Utilisateur bloqué avec succès');
        return redirect()->back();

    }

    public function authorize()
    {
        return auth()->user()->can('block_user');
    }
}
