<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowContact
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        $setting = Setting::get();
        return view('WebsiteUi::contact',compact('setting'))->with(['page_title' => trans('Contact us')]);
    }

}
