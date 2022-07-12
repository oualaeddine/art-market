<?php

namespace App\Modules\ProductsUi\Controllers;


use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedProducts
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Produits archivés', 'icon-package', 'blue', 'Liste des produits archivés');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Produits", 'url' => route('admin.products.index')],['name' => "Produits archivés", 'url' => route('admin.products.archived')]);

        if ($request->ajax()) {

            $data =  Product::query()->onlyTrashed()->orderby('created_at', 'desc');

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','ProductsUi::actions.btn-archived')
                    ->addColumn('responsive', function ($product) { return '';})
                   /*  ->addColumn('images','ProductsUi::actions.images') */
                    ->addColumn('price_old', function ($product) {

                        return '<span class="badge badge-warning shadow-sm">'.number_format($product->price_old ,2 ,".",",").'</span> ';

                         })

                    ->addColumn('price', function ($product) {

                        return '<span class="badge badge-primary shadow-sm">'.number_format($product->price ,2 ,".",",").'</span> ';

                         })
                ->addColumn('is_active', function ($product) {

                    if($product->is_active ){
                        return '<span class="badge badge-warning shadow-sm">Oui</span> ';
                    }else{
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';
                    }



                })

                    ->addColumn('created_at', function ($product) {

                            return $product->created_at;

                    })

                    ->rawColumns(['action',/* 'images', */'price_old','price','is_active','responsive','created_at'])
                    ->make(true);
        }

        return view('ProductsUi::index-archived', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Produits archivés"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
