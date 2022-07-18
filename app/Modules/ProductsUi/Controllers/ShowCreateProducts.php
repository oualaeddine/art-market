<?php

namespace App\Modules\ProductsUi\Controllers;

use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowCreateProducts
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $id=$request->vendor_id;

        $categories=Category::query()/* ->whereHas('vendors',function ($query) use ($id){
            $query->where('vendor_id',$id);
        }) */->get();

        $brands=Brand::query()/* ->whereHas('vendors',function ($query) use ($id){
            $query->where('vendor_id',$id);
        }) */->get();



        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Ajouter un produit');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Produits", 'url' => '/admin-dash/produits'],['name' => "Ajouter un produit", 'url' => '/admin-dash/produits/ajouter']);

        return view('ProductsUi::pages.create', compact('id','header', 'user_info','breadcrumbs','categories','brands'))->with(['page_title' => "Produits"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
