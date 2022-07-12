<?php

namespace App\Modules\UsersUi\Controllers;

use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class ShowPermissionPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Permissions', 'icon-lock', 'blue', 'Liste des permissions');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Permissions', 'url' => route('admin.permissions.index')]);

        if ($request->ajax()) {
            $data = Permission::orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
//                ->addColumn('action', 'UsersUi::Permission.actions.btn')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })
                ->rawColumns(['action', 'responsive', 'created_at'])
                ->make(true);

        }

        return view('UsersUi::Permission.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Permissions']);
    }

    public function authorize()
    {
        return auth()->user()->can('view_permission');
    }


}
