<?php

namespace App\Modules\UsersUi\Controllers;

use App\Models\User;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowUsersPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Utilisateurs', 'icon-user', 'blue', 'Liste des utilisateurs');

        $breadcrumbs = array(['name' => 'Utilisateurs', 'url' => route('admin.users.index')]);

        $user_info = Auth::user();

        if ($request->ajax()) {
            $data =  User::query()
                ->withTrashed()
                ->where('id','!=',\auth()->id())->with('roles')->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','UsersUi::actions.btn')
                ->addColumn('responsive', function ($param) { return '';})
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })
                ->addColumn('roles', function ($user) {
                    $text='';
                    foreach ($user->roles as $role){
                        $text=$text. '<span class="badge badge-info shadow-sm">' . $role->name . '</span> ';
                    }
                    return $text;

                })
                ->rawColumns(['action','roles','responsive','created_at'])
                ->make(true);

        }

        $roles =Role::query()->where('guard_name','web')->get();

        return view('UsersUi::index', compact('roles','header', 'user_info','breadcrumbs'))->with(['page_title' => 'Utilisateurs']);
    }

    public function authorize()
    {
        return auth()->user()->can('view_user');
    }
}
