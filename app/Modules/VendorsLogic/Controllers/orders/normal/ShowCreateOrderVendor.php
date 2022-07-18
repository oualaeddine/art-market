<?php

namespace App\Modules\VendorsLogic\Controllers\orders\normal;

use App\Models\Vendor;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowCreateOrderVendor
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Vendor $vendor)
    {
        $header = GenerateHeader::run("Commandes", 'icon-box', 'yellow', "Ajouter une commande");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => '/admin-dash/commandes'],['name' => "Ajouter une commande", 'url' => '/admin-dash/commandes/creer']);

        $products = Product::query()->where('vendor_id',$vendor->id)->get();

        $clients = Client::get();

        $wilayas = YalidineWilaya::get();

        return view('VendorsUi::pages.orders.create', compact('vendor','header','wilayas','clients','user_info','breadcrumbs','products'))->with(['page_title' => "Ajouter une commande"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
