<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\normal;




use App\Modules\OrdersLogic\Models\Order;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\Order_product;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowOrderDetails
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request, Order $order)
    {
        $header = GenerateHeader::run("Détail de Commande", 'icon-box', 'yellow', "Détail de Commande");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => route('vendor.orders.index')],['name' => "Détail de Commande", 'url' => route('vendor.orders.details',['order'=>$order->id])]);


        if ($request->ajax()) {
            $data =  Order_product::where('order_id',$order->id)->with('product')->orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addColumn('responsive', function ($order) { return '';})
                    ->addColumn('created_at', function ($order) {

                        return $order->created_at;

                    })
                    ->addColumn('price', function ($order) {

                        return number_format($order->price,2).' DA';
                    })
                    ->addColumn('total', function ($order) {

                        return number_format($order->price*$order->quantity,2).' DA';
                    })
                    ->rawColumns(['responsive','created_at'])
                    ->make(true);
        }

        return view('VendorsUi::Vendor.orders.normal.details', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Détail de Commande"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
