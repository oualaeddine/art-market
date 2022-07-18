<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\Modality;
use App\Models\P_param;
use App\Models\Product;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowClientEdit
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function authorize( )
    {
        return \auth()->user()->can('view_detail_client');
    }
    public function asController(Request $request,$id)
    {
        $header = GenerateHeader::run('Clients', 'icon-users', 'blue', 'Modifier un client');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Clients', 'url' => '/admin-dash/clients'],['name' => 'Modifier un client' , 'url' => '/cod-dash/clients/modifier/'.$id]);

        $id = base64_decode($id);

        $client = Client::whereId($id)->with('prinicpal_phone')->with('commune')->firstorfail();

        $wilayas = YalidineWilaya::get();

        return view('ClientsUi::pages.main.edit', compact('header', 'user_info','breadcrumbs','wilayas','client'))->with(['page_title' => 'Modifier un client']);
    }




}
