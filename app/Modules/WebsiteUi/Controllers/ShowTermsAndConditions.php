<?php

namespace App\Modules\WebsiteUi\Controllers;


use App\Helpers\SetLocal;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowTermsAndConditions
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


        $terms=Setting::query()->where('name',Session::get('client_lang')?'t_n_c_ar':'t_n_c_fr')->first();
        return view('WebsiteUi::terms_conditions',[
            'terms'=>$terms
        ])->with(['page_title' => Session::get('client_lang')?'الأحكام والشروط':'terms and conditions']);
    }

}
