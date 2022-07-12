<?php

namespace App\Modules\SettingsLogic\Controllers;


use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class EditSettings
{
    use AsAction;

    public function asController(ActionRequest $request, Setting $setting)
    {

        $setting = Setting::find($setting->id);

        return Response::json([
            'success' => true,
            'data' => $setting->toArray()
        ], 200);
    }

   /*  public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */
}
