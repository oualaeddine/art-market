<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\CouponFamilyLogic\Models\Coupon_family;
use App\Modules\CouponsLogic\Models\Coupon;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowClientArchivedCoupons
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function authorize()
    {
        return auth()->user()->can('view_client');
    }

    public function asController(Request $request, Client $client)
    {

        $user_info = Auth::user();

        $header = GenerateHeader::run('Coupons archivées', 'icon-user', 'blue', 'Liste des coupons archivées');
        $breadcrumbs = array(['name' => 'Clients', 'url' => route('admin.clients.index')], ['name' => 'Détails du client', 'url' => route('admin.clients.special', ['client' => $client->id])]);




        $client_coupons = Client_coupon::query()->onlyTrashed()->where('client_id', $client->id)->paginate(5);
        return view('ClientsUi::pages.coupons-archived', compact('client_coupons',  'client', 'header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Coupons archivé']);
    }





}
