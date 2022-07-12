<?php

namespace App\Modules\ClientsUi\Controllers\Contact;

use App\Modules\ClientsLogic\Models\Contact;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedContacts
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

        $breadcrumbs = array(['name' => 'Contacts', 'url' => route('admin.contacts.index')],['name' => 'Contacts archivés', 'url' => route('admin.contacts.archived')]);

        if ($request->ajax()) {
            $data = Contact::query()->onlyTrashed()->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'ClientsUi::actions.btn-contact-archived')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {
                    return $param->created_at;
                })
                ->addColumn('phone', function ($param) {
                    return '0' . $param->phone;
                })
                ->addColumn('status', function ($param) {
                    if ($param->status==='Pending') return 'En attente';
                    return 'Fait';
                })
                ->rawColumns(['action', 'responsive', 'created_at'])
                ->make(true);

        }
        return view('ClientsUi::index-contact-archived', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Contacts archivés']);
    }


}
