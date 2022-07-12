<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\users;

use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowCreateUser
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Vendors', 'icon-award', 'blue', 'Liste des users');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Vendors', 'url' => route('admin.vendors.index')]);
        $roles=Role::query()->where('guard_name','vendor')->get();
        return view('VendorsUi::Vendor.users.create', compact('roles','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendor']);
    }


}
