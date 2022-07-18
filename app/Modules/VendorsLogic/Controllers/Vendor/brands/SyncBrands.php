<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\brands;

use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SyncBrands
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);
        Session::flash('success', 'Marque ajoutée avec succès.');

        return redirect()->route('vendor.brands.index');
    }

    public function handle(ActionRequest $request)
    {
        auth()->guard('vendor')->user()->vendor()->first()->brands()->sync($request->brands);
    }


    public function rules(): array
    {
        return [
            'brands' => ['required', 'array'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en ar',
            'name_fr' => 'nom en fr',
        ];
    }

}
