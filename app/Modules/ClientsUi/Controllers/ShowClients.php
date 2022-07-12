<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowClients
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
        $header = GenerateHeader::run('Clients', 'icon-users', 'blue', 'Liste des clients');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Clients', 'url' => '/cod-dash/clients']);

        if ($request->ajax()) {
            $data =  Client::query()->with('commune');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','ClientsUi::actions.btn')
                    ->addColumn('responsive', function ($param) { return '';})
                    ->addColumn('created_at', function ($param) {
                        return $param->created_at;
                    })
                ->addColumn('phone', function ($param) {
                        return '0'.$param->phone;
                    })
                ->addColumn('commune', function ($param) {
                        if($param->commune != null){
                            return $param->commune->name;
                        }else{
                            return 'Aucune';
                        }

                    })
                    ->rawColumns(['action','commune','responsive','created_at'])
                    ->make(true);

        }
        return view('ClientsUi::index', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => 'Clients']);
    }




}
