<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\users;

use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowUsers
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Utilisateurs', 'icon-user', 'blue', 'Liste des utilisateurs');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Utilisateurs', 'url' => route('vendor.users.index')]);

        if ($request->ajax()) {

            $data = VendorUser::query()
                ->with('roles')
                ->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)
                ->orderByDesc('created_at');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::Vendor.actions.btn-users')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })
                ->addColumn('phone', function ($param) {

                    return '0'.$param->phone;

                })

                ->addColumn('is_active', function ($user) {

                    if ($user->is_active) return '<span class="badge badge-info">Oui</span>';
                    return '<span class="badge badge-danger">Non</span>';

                })
                ->rawColumns(['action','is_active', 'responsive', 'created_at'])
                ->make(true);


        }

        return view('VendorsUi::Vendor.users.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Utilisateurs']);
    }


}
