<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowClientSpecial
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request, Client $client)
    {
        $client->load('commune');

        $user_info = Auth::user();
        $wilayas = YalidineWilaya::all();

        $header = GenerateHeader::run('Clients', 'icon-user', 'blue', 'Détails du client');
        $breadcrumbs = array(['name' => 'Clients', 'url' => '/admin-dash/clients'], ['name' => 'Détails du client', 'url' => route('admin.clients.special', ['client' => $client->id])]);

        $tab = Session::get('detail_tab') ?? 'information';
        Session::forget('detail_tab');


        $communes = YalidineMairie::get();
        $client_wilaya=[
            'id'=>$client->commune->yalidineWilaya->id,
            'name'=>$client->wilaya
        ];

        $client_commune=[
            'id'=>$client->commune_id,
            'name'=>$client->commune->name
        ];
        $client_addresses = ClientAddress::query()->with('commune.wilaya')->where('client_id', $client->id)->get();
        $client_coupons=Client_coupon::query()->get();
        return view('ClientsUi::pages.special', compact('client_coupons','client_commune','client_wilaya','tab', 'client_addresses', 'communes', 'wilayas', 'client', 'header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Client']);
    }





}
