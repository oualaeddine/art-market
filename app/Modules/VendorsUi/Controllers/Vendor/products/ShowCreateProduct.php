<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\products;

use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowCreateProduct
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {

        $categories=Category::query()->whereHas('vendors',function ($query){
            $query->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id);
        })->get();

        $brands=Brand::query()->whereHas('vendors',function ($query){
            $query->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id);
        })->get();

        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Ajouter un produit');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Produits", 'url' => route('vendor.products.index')],['name' => "Ajouter un produit", 'url' => route('vendor.products.create')]);

        return view('VendorsUi::Vendor.products.create', compact('header', 'user_info','breadcrumbs','categories','brands'))->with(['page_title' => "Produits"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
