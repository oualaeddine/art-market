<?php

namespace App\Modules\WebsiteImagesLogic\Controllers;

use App\Modules\WebsiteImagesLogic\Models\Website_image;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateWebsiteImages
{
    use AsAction,UploadImageTrait;

    public function handle(ActionRequest $request, Website_image $website_image)
    {

        if ($request->image != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'image', 'website_images');
            $path = 'storage/website_images/' . $image_path;

            if($website_image->image != null){
                File::delete(public_path($website_image->image));
            }

            $website_image->update(['image' => $path]);
        }

        $bon = $website_image->update($this->getWebsiteImageFields($request));


        return $bon;

    }


    private function getWebsiteImageFields($request): array
    {
        return $request->only([ /* 'name', */
                                'main_title',
                                'title',
                                'type',
                                'product_id',
                                'link',
                                'sub_title',
                                'lang',
                                'is_active' ]);
    }

    public function rules(): array
    {
        return [
           /*  'name' => ['required','string','max:191'], */
            'main_title' => ['required','string','max:191'],
            'title' => ['nullable','string','max:191'],
            'sub_title' => ['nullable','string','max:191'],
            'product_id' => ['nullable','string'],
            'link' => ['nullable','string'],
            'type' => ['nullable','string'],
            'lang' => ['nullable','string','max:191'],
            'is_active' => ['nullable'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            /* 'name' => 'nom', */
            'main_title' => 'titre principal',
            'title' => 'titre',
            'link' => 'lien',
            'sub_title' => 'sous-titre',
            'type' => 'type',
            'product_id' => 'lien'
        ];
    }

    public function asController(ActionRequest $request, Website_image $website_image)
    {

        $bon = $this->handle($request,$website_image);

        Session::flash('message',"Image du site web  mis a jour avec succès");

        return redirect()->route('admin.website-images.index');
    }

   /*  public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */
}
