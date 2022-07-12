<?php

namespace App\Modules\VendorsLogic\Controllers;


use App\Models\Vendor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteVendor
{
    use AsAction;

    public function asController(Vendor $vendor)
    {
        $this->handle($vendor);
        Session::flash('success', 'Vendor archivé avec succès.');
        return redirect()->back();
    }

    public function handle($vendor): void
    {
//        if($vendor->logo_ar != null){
//            File::delete(public_path($vendor->logo_ar));
//        }
//        if($vendor->logo_fr != null){
//            File::delete(public_path($vendor->logo_fr));
//        }

        $vendor->delete();
    }


}
