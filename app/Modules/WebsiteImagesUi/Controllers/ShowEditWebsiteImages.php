<?php

namespace App\Modules\WebsiteImagesUi\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowEditWebsiteImages
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Website_image $website_image)
    {
        $header = GenerateHeader::run("Images du site web", 'icon-grid', 'blue', "Modifier une image");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Images du site web", 'url' => '/cod-dash/website-images'],['name' => "Modifier une image", 'url' => '/cod-dash/website-images/'.$website_image->id.'/modifier']);

        $images = $website_image;

        $products = Product::get();

        $categories = Category::get();
       
        return view('WebsiteImagesUi::pages.edit', compact('header','products','categories','user_info','breadcrumbs','images'))->with(['page_title' => "Images du site web"]);
    }

/*     public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */


}
