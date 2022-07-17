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

        $terms=Setting::query()->where('name',app()->getLocale()!='fr'?'t_n_c_ar':'t_n_c_fr')->first();
        return view('WebsiteUi::tnc',[
            'terms'=>$terms
        ])->with(['page_title' => trans('Terms and conditions')]);
    }

}
