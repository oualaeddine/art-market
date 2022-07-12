<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\products;

use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowProducts
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Produits', 'icon-award', 'blue', 'Liste des produits');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Produits', 'url' => route('vendor.products.index')]);

        if ($request->ajax()) {
            $data = Product::query()
                ->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)
                ->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','VendorsUi::Vendor.actions.btn-products')
                ->addColumn('responsive', function ($product) { return '';})
                /*  ->addColumn('images','ProductsUi::actions.images') */
                ->addColumn('price_old', function ($product) {

                    return '<span class="badge badge-warning shadow-sm">'.number_format($product->price_old ,2 ,".",",").' DA</span> ';

                })

                ->addColumn('price', function ($product) {

                    return '<span class="badge badge-primary shadow-sm">'.number_format($product->price ,2 ,".",",").' DA</span> ';

                })
                ->addColumn('is_active', function ($product) {

                    if($product->is_active ){
                        return '<span class="badge badge-success shadow-sm">Oui</span> ';
                    }else{
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';
                    }



                })
                ->addColumn('shipping', function ($product) {

                    return '<span class="badge badge-primary shadow-sm">'.number_format($product->shipping ,2 ,".",",").' DA</span> ';

                })
                ->addColumn('created_at', function ($product) {

                    return $product->created_at;

                })
                ->rawColumns(['action',/* 'images', */'price_old','shipping','price','is_active','responsive','created_at'])
                ->make(true);

        }

        return view('VendorsUi::Vendor.products.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Produit']);
    }


}
