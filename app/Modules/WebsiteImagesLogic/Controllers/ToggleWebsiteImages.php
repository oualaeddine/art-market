<?php

namespace App\Modules\WebsiteImagesLogic\Controllers;

use App\Modules\WebsiteImagesLogic\Models\Website_image;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleWebsiteImages
{
    use AsAction,UploadImageTrait;

    public function handle($website_image)
    {
        $website_image->update([
            'is_active'=>!$website_image->is_active
        ]);
    }

    public function asController(Website_image $website_image)
    {
        $this->handle($website_image);
        Session::flash('message',"Image mis à jour avec succès");
        return redirect()->back();
    }
}
