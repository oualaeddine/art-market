<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders;


use App\Models\ProductCoupon;

use App\Models\RawOrder;
use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use App\Modules\OrdersLogic\Models\Raw_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowUpgradeToOrder
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,RawOrder $order)
    {
        $order->load(['products.product']);
        $header = GenerateHeader::run("Attribuer la commande", 'icon-box', 'yellow', "Attribuer la commande");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Attribuer la commande", 'url' => '#']);

        $wilayas=YalidineWilaya::query()->get();

        $client=Client::query()->where('phone',$order->phone)->first();

        $client_wilaya=YalidineWilaya::query()->where('name','like','%'.$order->wilaya.'%')->first();
        $client_commune=YalidineMairie::query()->where('name','like','%'.$order->commune.'%')->first();
        return view('VendorsUi::Vendor.orders.raw.create_or_choose_client', compact('client_commune','client_wilaya','client','order','header', 'user_info','breadcrumbs','wilayas'))->with(['page_title' => "Attribuer la commande"]);
    }


//     public function authorize()
//    {
//        return auth()->user()->can('view_raw_order');
//    }

}
