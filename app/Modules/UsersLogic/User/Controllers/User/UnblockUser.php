<?php

namespace App\Modules\UsersLogic\User\Controllers\User;


use App\Models\User;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class UnblockUser
{
    use AsAction;

    public function handle($id)
    {
        // use is_blocked ?
        abort_if(auth()->id() == $id,401);


        $user = User::withTrashed()->findOrFail($id);

        $user->update([
            'blocked_at' => null
        ]);

        Session::flash('message','Utilisateur débloqué avec succès');
        return redirect()->back();

    }

    public function authorize()
    {
        return auth()->user()->can('block_user');
    }
}
