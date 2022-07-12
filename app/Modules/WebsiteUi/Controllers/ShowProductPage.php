<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\Vendor;
use App\Modules\ProductsLogic\Models\Product;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowProductPage
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request,$slug)
    {
        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }


        $product = Product::with('images')->with('brands')->where('slug',$slug)->firstorfail();

        $realted_products = Product::inRandomOrder()->limit(8)->get();

        $phone = Setting::where('name','contact tél 1')->first()->value?? '#';

        $selected_vendor=Vendor::query()->withCount('active_products as products_count')->where('id',$product->vendor_id)->firstOrFail();

        return view('WebsiteUi::product',compact('selected_vendor','product','realted_products','phone'))->with(['page_title' => 'Produit Détail']);
    }

}
