<?php

namespace App\Modules\UsersUi\Controllers;

use App\Models\Product;
use App\Modules\ProductsLogic\Controllers\Stepper\StepOne;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowLoginForm
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        return view('auth.login')->with(['page_title' => 'Se connecter']);
    }

}
