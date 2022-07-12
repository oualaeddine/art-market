<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowVendorDetail
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request,Vendor $vendor)
    {



        if (!in_array($request->trier,['','name_fr-asc','name_fr-desc','price-asc','price-desc','rating-desc','rating-asc'])){
            return redirect()->route('vendor-detail',['vendor'=>$vendor->id]);
        }

        $vendor->loadCount('active_products as products_count');
        $vendor->load('images');
        $lang = Session::get('client_lang');

        if ($lang) {
            SetLocal::generate('ar');
        }


        $categories = Category::query()->where(  'is_active',1)
          ->whereHas('products',function ($query)use ($vendor){
               $query->whereRelation('vendor','id',$vendor->id);

        })
            ->get();

        $brands = Brand::query()->whereHas('products')
           ->whereHas('products',function ($query)use ($vendor){
               $query->whereRelation('vendor','id',$vendor->id);
            })
            ->get();



        $per_page = $request->par_page?? 24;
        $price_l = $request->prix_l?? null;
        $price_u = $request->prix_u?? null;


        $sort_by = $request->trier?? 'name_fr-asc';

        $sort_by_array = explode('-',$sort_by);

        $category = $request->c??null;

        $brand = $request->marque??null;

        $products = Product::query()->orderby($sort_by_array[0],$sort_by_array[1])

            ->where('vendor_id',$vendor->id)
            ->where('is_active',1)
            ->when($request->filled('c'),function($query) use($category){
                $query->wherehas('categories',function($q) use($category){
                    $q->where('name_fr',$category)
                        ->orWhere('name_ar',$category);
                });
            })->when($request->filled('marque'),function($query) use($brand){
                $query->wherehas('brands',function($q) use($brand){
                    $q->where('name_fr',$brand)
                        ->orWhere('name_ar',$brand);
                });
            })->when($request->filled('prix_l','prix_u'),function($query) use($price_l,$price_u){
                $query->whereBetween('price', [$price_l, $price_u]);
            })


            ->paginate($per_page);


        return view('WebsiteUi::vendor-detail', compact(  'category','brand','categories','brands','products','per_page','sort_by','vendor'))->with(['page_title' => 'Vendor Detail']);
    }

}
