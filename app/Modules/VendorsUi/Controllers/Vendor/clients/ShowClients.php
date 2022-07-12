<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\clients;

use App\Models\Vendor;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function asset;
use function route;
use function view;

class ShowClients
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Clients', 'icon-award', 'blue', 'Liste des clients');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Clients', 'url' => route('vendor.clients.index')]);

        if ($request->ajax()) {
            $data = Client::query()->whereHas('clients_vendors',function ($query){
                $query->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id);
            });
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::Vendor.actions.btn-clients')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {
                    return $param->created_at;
                })


                ->addColumn('last_name', function ($client) {


                        return '<span class="badge badge-info shadow-sm">'.$client->last_name.'</span> ';

                })
                ->addColumn('first_name', function ($client) {


                        return '<span class="badge badge-info shadow-sm">'.$client->first_name.'</span> ';

                })

                ->addColumn('phone', function ($client) {


                        return '<span class="badge badge-info shadow-sm">'.$client->phone.'</span> ';

                })


                ->rawColumns(['action','phone','first_name','last_name','responsive', 'created_at'])
                ->make(true);

        }

        return view('VendorsUi::Vendor.clients.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendor']);
    }


}
