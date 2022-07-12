<?php

namespace App\Modules\SettingsLogic\Controllers;


use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateSettings
{
    use AsAction;

    public function handle(ActionRequest $request, Setting $setting)
    {
        $bon = $setting->update($this->getSettingFields($request));

        return $bon;

    }


    private function getSettingFields($request): array
    {
        return $request->only(['value']);
    }

    public function rules(): array
    {
        return [
            'value' => ['required','string','max:65000'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'value' => 'valeur',
        ];
    }

    public function asController(ActionRequest $request, Setting $setting)
    {

        $bon = $this->handle($request,$setting);

        Session::flash('message',"Paramètre mis a jour avec succès");

        return redirect()->route('admin.settings.index');
    }

   /*  public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */
}
