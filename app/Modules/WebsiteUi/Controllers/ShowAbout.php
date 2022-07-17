<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowAbout
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        $about = Setting::where('name','about_us_fr')->first();

        return view('WebsiteUi::about',compact('about'))->with(['page_title' => trans('About Us')]);
    }

}
