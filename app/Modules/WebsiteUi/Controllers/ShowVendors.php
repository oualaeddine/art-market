<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\Vendor;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowVendors
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        $lang = Session::get('client_lang');

        if ($lang) {
            SetLocal::generate('ar');
        }


        $per_page = $request->par_page ?? 24;

        $sort_by = $request->trier ?? 'name_fr-asc';

        $sort_by_array = explode('-', $sort_by);

        if ($request->ajax()) {

            $vendors = Vendor::query()->whereHas('vendors', function ($query) {
                $query->where('is_active', 1);
            })
                ->count();

            if ($vendors == 0) {
                return response()->json([
                    "vendors_div" => '   <div class="col-12 text-center">


                                         <img src="' . asset('data-none.png') . '" style="width: 200px" alt="">
                                         <h4 class="section-title">' . trans("aucune donnée n'a été trouvée") . '</h4>

                                     </div>',
                    "load_more_div" => ''
                ]);

            }

            return response()->json($this->getData($request));
        }


        return view('WebsiteUi::vendors', compact('per_page', 'sort_by'))->with(['page_title' => 'Vendor']);
    }

    public function getData($request)
    {
        $sort_by = $request->trier ?? 'name_fr-asc';

        $sort_by_array = explode('-', $sort_by);
        $vendors = Vendor::query()
            ->whereHas('vendors', function ($query) {
                $query->where('is_active', 1);
            })
            ->when($request->filled('id'), function ($query) use ($request) {
                $query->where('id', '>', $request->id);

            })
           // ->orderBy($sort_by_array[0], $sort_by_array[1])
            ->withCount('active_products')
            ->take(24)
            ->get();


        $vendors_div = "";
        $load_more_div = "";
        $last_id = '';
        if ($vendors->isNotEmpty()) {
            foreach ($vendors as $vendor) {
                $vendors_div .= $this->concatVendors($vendor);
                $last_id = $vendor->id;
            }
            if (Vendor::query()   ->whereHas('vendors', function ($query) {
                $query->where('is_active', 1);
            })->where('id', '>', $last_id)->exists()){

                $load_more_div = '
    <div>
                                            <button type="button" data-id="' . $last_id . '" id="load_more_button" class="btn btn-color mb-2 w-100">
                                                '.trans('Charger plus').'
                                            </button>
                                        </div>
           <div>';
            }



            return [
                "vendors_div" => $vendors_div,
                "load_more_div" => $load_more_div
            ];
        }

        $vendors_div .= '   <div class="col-12 text-center">
                                         <h4 class="section-title">' . trans("aucune donnée n'a été trouvée") . '</h4>
                                     </div>';
        return [
            "vendors_div" => $vendors_div,
            "load_more_div" => $load_more_div
        ];
    }

    public function concatVendors($vendor)
    {

        return '<div class="col-md-3 col-6 item-width mb-30">
                                             <div class="product-item">
                                                 <div class="product-image shadow-sm text-center"> <a
                                                         href="' . route('vendor-detail', ['vendor' => $vendor->name_fr]) . '">

                                                             <img src="' . asset($vendor->logo_fr ?? $vendor->logo_ar) . '" class="ratio-vendor" alt="image-alt">

                                                     </a>

                                                 </div>
                                                 <div class="product-item-details">
                                                     <div class="product-item-name"> <a
                                                             href="' . route('vendor-detail', ['vendor' => $vendor->name_fr]) . '">' . (Session::get('client_lang') ? $vendor->name_ar : $vendor->name_fr) . '</a>
                                                     </div>
                                                     <div class="price-box"> <span
                                                             class="price">' . $vendor->active_products_count . trans('Produits') . '</span> </div>
                                                 </div>
                                             </div>
                                         </div>';
    }

}
