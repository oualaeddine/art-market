<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowClientCreate
{
    use AsAction;

    public function handle()
    {
        // ...
    }

//    public function authorize()
//    {
//        return \auth()->user()->can('create_client');
//    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Clients', 'icon-users', 'green', 'Ajouter un Client');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Clients', 'url' => '/cod-dash/clients'], ['name' => 'Ajouter un client', 'url' => '/cod-dash/clients/creer']);

        $wilayas = YalidineWilaya::get();

        $communes = YalidineMairie::get();


        return view('ClientsUi::pages.main.create', compact('header', 'user_info', 'breadcrumbs', 'wilayas','communes'))->with(['page_title' => 'Créer un client']);
    }


}
