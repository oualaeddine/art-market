<?php

namespace App\Modules\OrdersUi\Controllers;

use App\Models\ProductCoupon;

use App\Models\RawOrder;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use App\Modules\ProductsLogic\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowRawOrders
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Nouvelle commandes", 'icon-box', 'yellow', "Liste des nouvelle commandes");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Nouvelle commandes", 'url' => '/admin-dash/raw-commandes']);

        if ($request->ajax()) {
            $data =  RawOrder::query()
                ->with('vendor')
                ->when($request->filled('from_date') && $request->filled('to_date'),function ($query) use ($request){
                   $query->whereBetween('created_at', array(Carbon::parse($request->from_date.'00:00:00')->format('Y-m-d H:i:s'), Carbon::parse($request->to_date.'23:59:59')->format('Y-m-d H:i:s')));
                })
                ->orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','OrdersUi::actions.btn-raw')
                    ->addColumn('responsive', function ($order) { return '';})
                    ->addColumn('created_at', function ($order) {

                        return $order->created_at;

                    })
                ->addColumn('name', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">'.$order->full_name.'</span> ';

                    })
                ->addColumn('total', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">' . number_format($order->total, 2, ".", ",") . ' DA</span> ';

                })
                ->addColumn('vendor', function ($order) {
                    return '<span class="badge badge-primary shadow-sm">'.$order->vendor->name_fr.'</span> ';
                })
                ->addColumn('tracking_code', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">'.$order->tracking_code.'</span> ';

                })
                ->addColumn('phone', function ($order) {

                    return '<span class="badge badge-primary shadow-sm">'.'0'.$order->phone.'</span> ';

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
                    ->rawColumns(['action','vendor','tracking_code','name','total','phone','responsive','updated_at','created_at','status'])
                    ->make(true);

        }

        return view('OrdersUi::index-raw', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Nouvelle commandes"]);
    }


     public function authorize()
    {
        return auth()->user()->can('view_raw_order');
    }

}
