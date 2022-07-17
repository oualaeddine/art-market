<?php

namespace App\Modules\WebsiteUi\Controllers;


use App\Helpers\SetLocal;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowPrivacy
{

    use AsAction;


    public function asController(ActionRequest $request)
    {


        $terms=Setting::query()->where('name',app()->getLocale()!='fr'?'pvc_ar':'pvc_fr')->first();

        return view('WebsiteUi::privacy',[
            'terms'=>$terms
        ])->with(['page_title' => trans('Privacy')]);
    }

}
