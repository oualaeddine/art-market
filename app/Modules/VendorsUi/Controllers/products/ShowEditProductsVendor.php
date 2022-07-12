<?php

namespace App\Modules\VendorsUi\Controllers\products;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowEditProductsVendor
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Product $product)
    {
        $product->load(['categories','brands']);

        $categories=Category::query()->whereHas('vendors',function ($query) use ($product){
            $query->where('vendor_id',$product->vendor_id);
        })->get();

        $brands=Brand::query()->whereHas('vendors',function ($query) use ($product){
            $query->where('vendor_id',$product->vendor_id);
        })->get();

        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Modifier un produit');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Produits", 'url' => route('admin.vendors.index',['#Products'])],['name' => "Modifier un produit", 'url' => '#']);


         $selected_categories=$product->categories()->pluck('categories.id')->toArray();
         $selected_brands=$product->brands()->pluck('brands.id')->toArray();


        return view('VendorsUi::pages.products.edit', compact('header', 'user_info','breadcrumbs','selected_categories','product','categories','selected_brands','brands'))->with(['page_title' => "Produits"]);

    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
