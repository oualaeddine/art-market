<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\normal;


use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowCreateOrder
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Commandes", 'icon-box', 'yellow', "Ajouter une commande");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => '/cod-dash/commandes'],['name' => "Ajouter une commande", 'url' => '/cod-dash/commandes/creer']);

        $products = Product::query()->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)->get();

        $clients = Client::get();

        $wilayas = YalidineWilaya::get();

        return view('VendorsUi::Vendor.orders.normal.create', compact('header','wilayas','clients','user_info','breadcrumbs','products'))->with(['page_title' => "Ajouter une commande"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
