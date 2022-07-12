<?php

namespace App\Modules\BrandsLogic\Controllers;


use App\Modules\BrandsLogic\Models\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleBrand
{
    use AsAction;

    public function asController(Brand $brand)
    {
        $this->handle($brand);
        Session::flash('success', 'Marque mis à jour avec succès.');
        return redirect()->back();
    }

    public function handle($brand): void
    {
        $brand->update([
            'is_active'=>!$brand->is_active
        ]);
    }


}
