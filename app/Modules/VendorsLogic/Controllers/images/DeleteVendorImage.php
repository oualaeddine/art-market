<?php

namespace App\Modules\VendorsLogic\Controllers\images;


use App\Models\Vendor;
use App\Models\VendorImage;
use App\Models\VendorUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteVendorImage
{
    use AsAction;

    public function asController(VendorImage $image)
    {
        $vendor_id=$image->vendor_id;
        $this->handle($image);
        Session::flash('success', 'Image de vendeur supprimé avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor_id,'type'=>'all','#informations']);
    }

    public function handle($image): void
    {

        File::delete(public_path($image->img_fr));
        File::delete(public_path($image->img_ar));
        $image->delete();
    }


}
