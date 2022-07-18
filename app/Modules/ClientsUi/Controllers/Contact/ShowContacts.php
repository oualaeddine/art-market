<?php

namespace App\Modules\ClientsUi\Controllers\Contact;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Contact;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowContacts
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
        $header = GenerateHeader::run('Contacts', 'icon-users', 'blue', 'Liste des contact');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Clients', 'url' => '/admin-dash/contacts']);

        if ($request->ajax()) {
            $data =  Contact::query()->orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','ClientsUi::actions.btn-contact')
                    ->addColumn('responsive', function ($param) { return '';})
                    ->addColumn('created_at', function ($param) {
                        return $param->created_at;
                    })
                ->addColumn('phone', function ($param) {
                        return '0'.$param->phone;
                    })
                ->addColumn('status', function ($param) {
                    if ($param->status==='Pending'){
                        return 'En attente ';
                    }
                    return 'Complète';
                })
                    ->rawColumns(['action','responsive','created_at'])
                    ->make(true);

        }
        return view('ClientsUi::index-contact', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => 'Contacts']);
    }




}
