<?php

namespace App\Modules\VendorsUi\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowCreateVendors
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Vendeurs', 'icon-award', 'blue', 'Ajouter un vendeur');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Vendeurs', 'url' => route('admin.vendors.index')],['name'=>'Ajouter un vendeur','url'=>route('admin.vendors.create')]);

        $roles=Role::query()->where('guard_name','vendor')->get();

        return view('VendorsUi::pages.create', compact('roles','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendor Create']);
    }


}
