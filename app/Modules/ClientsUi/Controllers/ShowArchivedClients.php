<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedClients
{
    use AsAction;

    public function handle()
    {
        // ...
    }


//    public function authorize()
//    {
//        return auth()->user()->can('view_client');
//    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Clients', 'icon-users', 'red', 'Liste des clients archivés');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Clients', 'url' => '/faci-dash/clients'],['name'=>'Clients archivés','url'=>route('admin.clients.archived')]);

        if ($request->ajax()) {
            $data =  Client::query()->onlyTrashed()->with('commune')->orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','ClientsUi::actions.btn-clients-archived')
                    ->addColumn('responsive', function ($param) { return '';})
                    ->addColumn('created_at', function ($param) {
                        return $param->created_at;
                    })  ->addColumn('commune', function ($param) {
                        return $param->commune->name??'';
                    })
                    ->rawColumns(['action','responsive','created_at'])
                    ->make(true);

        }
        return view('ClientsUi::archived', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => 'Archived Clients']);
    }




}
