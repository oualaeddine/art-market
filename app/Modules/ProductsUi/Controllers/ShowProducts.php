<?php

namespace App\Modules\ProductsUi\Controllers;


use App\Models\Vendor;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowProducts
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Liste des produits');

        $user_info = Auth::user();
        $vendors=Vendor::query()->get();
        $breadcrumbs = array(['name' => "Produits", 'url' => '/admin-dash/produits']);

        if ($request->ajax()) {

            $data =  Product::orderby('created_at', 'desc');

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','ProductsUi::actions.btn')
                    ->addColumn('responsive', function ($product) { return '';})
                   /*  ->addColumn('images','ProductsUi::actions.images') */
                    ->addColumn('price_old', function ($product) {

                        return '<span class="badge badge-warning shadow-sm">'.number_format($product->price_old ,2 ,".",",").' DA</span> ';

                         })

                    ->addColumn('price', function ($product) {

                        return '<span class="badge badge-primary shadow-sm">'.number_format($product->price ,2 ,".",",").' DA</span> ';

                         })
                ->addColumn('shipping', function ($product) {

                        return '<span class="badge badge-primary shadow-sm">'.number_format($product->shipping ,2 ,".",",").' DA</span> ';

                         })
                ->addColumn('is_active', function ($product) {

                    if($product->is_active ){
                        return '<span class="badge badge-success shadow-sm">Oui</span> ';
                    }else{
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';
                    }



                })

                    ->addColumn('created_at', function ($product) {

                            return $product->created_at;

                    })

                    ->rawColumns(['action',/* 'images', */'price_old','shipping','price','is_active','responsive','created_at'])
                    ->make(true);
        }

        return view('ProductsUi::index', compact('vendors','header', 'user_info','breadcrumbs'))->with(['page_title' => "Produits"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
