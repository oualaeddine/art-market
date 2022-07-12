<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\ClientFileType;
use App\Models\Modality;
use App\Models\P_param;
use App\Models\Product;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowCreateClientFile
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

    public function asController(Request $request,Client $client)
    {
        $header = GenerateHeader::run('Documents dossier facilité', 'icon-users', 'blue', 'Ajouter documents dossier facilité');

        $user_info = Auth::user();

        $breadcrumbs = array(
            ['name' => 'Clients', 'url' => route('admin.clients.index')],
            ['name'=>'Détails du client','url'=>route('admin.clients.special',['client'=>$client->id])],
            ['name'=>'Ajouter documents facilité','url'=>route('admin.clients.create-file',['client'=>$client->id])],
        );

        $file_types=ClientFileType::get();
        return view('ClientsUi::pages.file.create', compact('client','file_types','header', 'user_info','breadcrumbs'))->with(['page_title' => 'Create Client File']);
    }




}
