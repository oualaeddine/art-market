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

    public function asController(ActionRequest $request,Product $product)
    {
        abort_if(!$product->is_active,404);


        $realted_products = Product::query()->withWhereHas('vendor')->with(['categories','brands'])->inRandomOrder()->limit(10)->get();


        $selected_vendor=Vendor::query()->withCount('active_products as products_count')->where('id',$product->vendor_id)->firstOrFail();

        return view('WebsiteUi::product',compact('selected_vendor','product','realted_products'))->with(['page_title' => trans('Product detail')]);
    }

}
