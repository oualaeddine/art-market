<?php

namespace App\Modules\OrdersUi\Controllers;


use App\Modules\OrdersLogic\Models\Order;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedOrders
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Commandes archivées", 'icon-box', 'yellow', "Liste des commandes archivées");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => '/cod-dash/commandes'],['name' => "Commandes archivées", 'url' => '/cod-dash/commandes/archived']);

        $products = Product::get();


        if ($request->ajax()) {
            $data =  Order::query()
                ->when($request->filled('client_id'),function ($query)use ($request){
                    $query->where('client',$request->client_id);
                })
                ->onlyTrashed()->with(['clientRelation','address.commune.wilaya'])->orderby('created_at', 'desc');

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','OrdersUi::actions.btn-archived')
                    ->addColumn('responsive', function ($order) { return '';})
                    ->addColumn('created_at', function ($order) {

                        return $order->created_at;

                    })
                    ->addColumn('updated_at', function ($order) {

                        return $order->updated_at;

                    })
                    ->addColumn('total', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">' . number_format($order->total, 2, ".", ",") . ' DA</span> ';

                    })
                    ->addColumn('updated_by', function ($order) {

                        if($order->user){
                            return '<span class="badge badge-success shadow-sm">'.$order->user->name.'</span> ';
                        }else{
                            return '<span class="badge badge-primary shadow-sm">Aucune</span> ';
                        }


                    })
                    ->addColumn('tracking_code', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">'.$order->tracking_code.'</span> ';

                    })
                    ->addColumn('name', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">'.$order->clientRelation->last_name.' '.$order->clientRelation->first_name.'</span> ';

                    })
                    ->addColumn('phone', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">0'.$order->clientRelation->phone.'</span> ';

                    })
                    ->addColumn('status', function ($order) {

                        switch($order->status){
                            case('pending'):
                                return '<span class="badge badge-warning shadow-sm"> en attente</span> ';
                                break;
                            case('confirmed'):
                                return '<span class="badge badge-success shadow-sm">confirmé</span> ';
                                break;
                            case('canceled'):
                                return '<span class="badge badge-danger shadow-sm">annulé</span> ';
                                break;
                            case('completed'):
                                return '<span class="badge badge-primary shadow-sm">terminé</span> ';
                                break;
                        }

                    })
                     ->rawColumns(['action','tracking_code','total','name','phone','responsive','updated_at','created_at','updated_by','status'])
                    ->make(true);

        }

        return view('OrdersUi::index-archived', compact('header', 'user_info','breadcrumbs','products'))->with(['page_title' => "Commandes archivées"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
