<?php

namespace App\Modules\UsersUi\Controllers;

use App\Models\User;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowRolesPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Rôles', 'icon-lock', 'blue', 'Liste des Rôles');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Rôles', 'url' => route('admin.roles.index')]);
        $permissions=Permission::all();

        if ($request->ajax()) {
            $data =  Role::orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','UsersUi::Roles.actions.btn')
                ->addColumn('responsive', function ($param) { return '';})
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })->addColumn('permissions', function ($role) {
                    $text="";

                    foreach ($role->permissions as $permission)
                    {
                        $text=$text.'<span  class="badge badge-info">' . $permission->name . '</span> ';
                    }
                    return $text;
                })
                ->rawColumns(['action','permissions','responsive','created_at'])
                ->make(true);

        }

        return view('UsersUi::Roles.index', compact('header', 'permissions','user_info','breadcrumbs'))->with(['page_title' => 'Roles']);
    }


    public function authorize()
    {
        return auth()->user()->can('view_role');
    }


}
