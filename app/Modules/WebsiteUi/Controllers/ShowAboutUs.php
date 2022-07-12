<?php

namespace App\Modules\WebsiteUi\Controllers;


use App\Helpers\SetLocal;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowAboutUs
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }


        $terms=Setting::query()->where('name',Session::get('client_lang')?'about_us_ar':'about_us_fr')->first();
        return view('WebsiteUi::about_us',[
            'terms'=>$terms
        ])->with(['page_title' => Session::get('client_lang')?'معلومات عنا':'à propos de nous']);
    }

}
