<?php

namespace App\Modules\VendorsUi\Controllers\products;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowCreateProductsVendor
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Vendor $vendor)
    {

        $categories=Category::query()->whereHas('vendors',function ($query) use ($vendor){
            $query->where('vendor_id',$vendor->id);
        })->get();

        $brands=Brand::query()->whereHas('vendors',function ($query) use ($vendor){
            $query->where('vendor_id',$vendor->id);
        })->get();
        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Ajouter un produit');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Produits", 'url' => route('admin.vendors.index',['#Products'])],['name' => "Ajouter un produit", 'url' => '#']);

        return view('VendorsUi::pages.products.create', compact('vendor','header', 'user_info','breadcrumbs','categories','brands'))->with(['page_title' => "Produits"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
