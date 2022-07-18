<?php

namespace App\Modules\VendorsLogic\Controllers;


use App\Models\Vendor;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleVendor
{
    use AsAction;

    public function asController(Vendor $vendor)
    {
        $this->handle($vendor);
        Session::flash('success', 'Vendeur mis à jour avec succès.');
        return redirect()->back();
    }

    public function handle($vendor): void
    {

        $vendor->update([
            'is_active'=>!$vendor->is_active
        ]);
    }


}
