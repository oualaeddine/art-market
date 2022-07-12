<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\orders\normal;

use App\Models\RawOrder;
use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowOrders
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Commandes confirmées', 'icon-award', 'blue', 'Liste des commandes confirmées');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Commandes confirmées', 'url' => route('vendor.orders.index')]);

        if ($request->ajax()) {
            $data =  Order::query()
                ->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)
                ->with(['clientRelation','address.commune.wilaya'])
                ->orderby('created_at', 'desc');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','VendorsUi::Vendor.actions.btn-orders')
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

        return view('VendorsUi::Vendor.orders.normal.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Commandes confirmées']);
    }


}
