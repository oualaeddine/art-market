<?php

namespace App\Modules\WebsiteLogic\Controllers\Help;

use App\Modules\ClientsLogic\Models\Contact;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SetLang
{
    use AsAction;


    public function asController($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
