<?php

namespace App\Modules\VendorsUi\Controllers\images;


use App\Models\Vendor;
use App\Models\VendorImage;
use App\Models\VendorUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class GetVendorImage
{
    use AsAction;


    public function handle(VendorImage $image)
    {
            return [
              'name'=>$image->name,
            ];
    }


}
