<?php

namespace App\Modules\OrdersUi\Controllers;


use App\Models\Vendor;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowOrders
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Commandes", 'icon-box', 'yellow', "Liste des commandes");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => '/cod-dash/commandes']);

        $products = Product::get();
        $vendors = Vendor::query()->get();

        if ($request->ajax()) {
            $data = Order::query()
                ->when($request->filled('client_id'),function ($query) use ($request){
                    $query->where('client',$request->client_id);
                })
                ->when($request->filled('from_date') && $request->filled('to_date'),function ($query) use ($request){
                    $query->whereBetween('created_at', array(Carbon::parse($request->from_date.' 00:00:00')->format('Y-m-d H:i:s'), Carbon::parse($request->to_date.' 23:59:59')->format('Y-m-d H:i:s')));
                })
                ->with(['vendor','clientRelation', 'address.commune.wilaya'])->orderby('created_at', 'desc');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'OrdersUi::actions.btn')
                ->addColumn('responsive', function ($order) {
                    return '';
                })
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

                    if ($order->user) {
                        return '<span class="badge badge-success shadow-sm">' . $order->user->name . '</span> ';
                    } else {
                        return '<span class="badge badge-primary shadow-sm">Aucune</span> ';
                    }


                })
                ->addColumn('vendor', function ($order) {
                        return '<span class="badge badge-primary shadow-sm">'.$order->vendor->name_fr.'</span> ';
                })
                ->addColumn('tracking_code', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">' . $order->tracking_code . '</span> ';

                })
                ->addColumn('name', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">' . $order->clientRelation->last_name . ' ' . $order->clientRelation->first_name . '</span> ';

                })
                ->addColumn('phone', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">0' . $order->clientRelation->phone . '</span> ';

                })
                ->addColumn('status', function ($order) {

                    switch ($order->status) {
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
                ->rawColumns(['action','vendor', 'tracking_code', 'total', 'name', 'phone', 'responsive', 'updated_at', 'created_at', 'updated_by', 'status'])
                ->make(true);

        }

        return view('OrdersUi::index', compact('vendors','header', 'user_info', 'breadcrumbs', 'products'))->with(['page_title' => "Commandes"]);
    }


    /*    public function authorize()
       {
           return auth()->user()->can('view_bon_achat');
       } */

}
