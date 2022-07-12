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

class ShowShop
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {
        if (!in_array($request->trier,['','name_fr-asc','name_fr-desc','created_at-desc','price-asc','price-desc','rating-desc','rating-asc'])){
            return redirect()->route('shop');
        }

        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
        }
        $selected_vendor=Vendor::query()->withCount('active_products as products_count')->where('name_fr',$request->vendor)->first();


        $categories = Category::query()->where(  'is_active',1)
            ->with('sub_categories')
            ->when($request->filled('vendor_id') && $selected_vendor,function ($query) use ($selected_vendor){
            $query->whereHas('products',function ($query)use ($selected_vendor){
                $query->where('vendors_products_categories.vendor_id',$selected_vendor->id);
            });
        })
            ->whereHas('products')->withCount('products')->get();

        $brands = Brand::query()->whereHas('products')->when($request->filled('vendor_id')&&$selected_vendor,function ($query) use ($selected_vendor){
            $query->whereHas('products',function ($query)use ($selected_vendor){
                $query->where('vendor_id',$selected_vendor->id);
            });
        })
            ->withCount('products')->get();

        $serach = $request->search?? null;

        $per_page = $request->par_page?? 24;
        $price_l = $request->prix_l?? null;
        $price_u = $request->prix_u?? null;
        $vendors=Vendor::query()->whereHas('products')->whereHas('vendors',function ($query){
            $query->where('is_active',1);
        })->get();

        $sort_by = $request->trier?? 'name_fr-asc';

        $sort_by_array = explode('-',$sort_by);

        $category = $request->c??null;

        $brand = $request->marque??null;

        $products = Product::query()->orderby($sort_by_array[0],$sort_by_array[1])
            ->when($request->filled('vendor'),function ($query) use ($request){
                $query->whereHas('vendor',function ($query) use ($request){
                    $query->where('name_fr',$request->vendor);
                });
            })
            ->where('is_active',1)
                ->when($request->filled('search'),function($query) use($request){
                    $query->where(function ($query) use($request){
                        $query->where('name_fr', 'like', '%' . $request->search . '%')
                            ->orWhere('slug', 'like', '%' . $request->search . '%')
                            ->orWhere('ref', 'like', '%' . $request->search . '%')
                            ->orWhere('name_ar', 'like', '%' . $request->search . '%');
                    });
                })->when($request->filled('c'),function($query) use($category){
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




        return view('WebsiteUi::shop',compact('brand','category','vendors','selected_vendor','categories','brands','products','per_page','sort_by','serach'))->with(['page_title' => 'Shop']);
    }

}
