<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\HomeOffer;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowHome
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }


        //$request->session()->put('client_lang','ar');

        $new_arrived = Product::query()->where('is_active',1)->whereIn('id',HomeOffer::query()->pluck('product_id')->toArray())->limit(16)->get();

        $daily_deals = Product::query()->where('is_active',1)->whereHas('vendor')->inRandomOrder()->limit(16)->get();

        $top_categories = Category::query()->where(  'is_active',1)->whereHas('products')->whereHas('home_category')->get();

        $new_products = Product::query()->where('is_active',1)->orderby('created_at','desc')->limit(8)->get();

        $best_seller = Product::query()->where('is_active',1)->inRandomOrder()->limit(8)->get();

        $brands = Brand::query()->whereHas('products')->get();

        $slider = Website_image::query()->where('is_active',1)->where('name','like',(Session::get('client_lang')?'SliderAr%':'Slider%'))->where('lang',Session::get('client_lang')?'ar':'fr')->get();

        $tops = Website_image::query()->where('is_active',1)->where('name','like',(Session::get('client_lang')?'TopAr%':'Top%'))->where('lang',Session::get('client_lang')?'ar':'fr')->get();

        $banner = Website_image::query()->where('is_active',1)->where('name','like',(Session::get('client_lang')?'%BannerAr%':'%Banner%'))->where('lang',Session::get('client_lang')?'ar':'fr')->first();

        $icons = Website_image::query()->where('is_active',1)->where('name','like',(Session::get('client_lang')?'IconAr':'Icon%'))->where('lang',Session::get('client_lang')?'ar':'fr')->get();

        $categories=Category::query()->where('parent_id',null)->where('is_active',1)->with('sub_categories')->get();

        return view('WebsiteUi::index',compact('categories','banner','icons','tops','new_arrived','daily_deals','top_categories','new_products','slider','best_seller','brands'))->with(['page_title' => 'Accueil']);
    }

}
