<?php

namespace App\Modules\BrandsLogic\Controllers;


use App\Modules\BrandsLogic\Models\Brand;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class EditBrand
{
    use AsAction;

    public function handle(Request $request,Brand $brand)
    {
        return [
            'name_ar' => $brand->name_ar,
            'name_fr' => $brand->name_fr,
        ];
    }

}
