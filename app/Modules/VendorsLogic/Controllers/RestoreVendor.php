<?php

namespace App\Modules\VendorsLogic\Controllers;


use App\Models\Vendor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreVendor
{
    use AsAction;

    public function asController(Vendor $vendor)
    {
        $this->handle($vendor);
        Session::flash('success', 'Vendor restauré avec succès.');
        return redirect()->back();
    }

    public function handle($vendor): void
    {
        $vendor->restore();
    }


}
