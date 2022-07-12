<?php

namespace App\Modules\UsersUi\Controllers;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowForgetPasswordForm
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController()
    {
        return view('auth.forget_password')->with(['page_title' => 'mot de passe oublié']);
    }

}
