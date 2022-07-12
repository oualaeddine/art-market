<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\images;


use App\Models\Vendor;
use App\Models\VendorImage;
use App\Models\VendorUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteImage
{
    use AsAction;

    public function asController(VendorImage $image)
    {

        $this->handle($image);
        Session::flash('success', 'Image supprimé avec succès.');
        return redirect()->back();
    }

    public function handle($image): void
    {

        File::delete(public_path($image->img_fr));
        File::delete(public_path($image->img_ar));
        $image->delete();
    }

    public function authorize(){
      return request()->image->vendor_id==auth()->id();
    }


}
