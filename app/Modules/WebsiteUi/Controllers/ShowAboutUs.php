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


    public function asController(ActionRequest $request)
    {


        $terms=Setting::query()->where('name',app()->getLocale()!='fr'?'about_us_ar':'about_us_fr')->first();
        return view('WebsiteUi::about_us',[
            'terms'=>$terms
        ])->with(['page_title' => trans('About us')]);
    }

}
