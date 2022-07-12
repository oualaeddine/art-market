<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\orders\raw;

use App\Models\RawOrder;
use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowRawOrders
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Nouvelles commandes', 'icon-award', 'blue', 'Liste des nouvelles commandes');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Nouvelles commandes', 'url' => route('vendor.orders.raw.index')]);

        if ($request->ajax()) {
            $data =  RawOrder::query()->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','VendorsUi::Vendor.actions.btn-raw')
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
                ->rawColumns(['action','tracking_code','name','total','phone','responsive','updated_at','created_at','status'])
                ->make(true);

        }

        return view('VendorsUi::Vendor.orders.raw.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Nouvelles commandes']);
    }


}
