<?php

namespace App\Modules\VendorsUi\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedVendors
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Vendeurs archivés', 'icon-award', 'blue', 'Liste des vendeurs archivés');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Vendeurs', 'url' => route('admin.vendors.index')],['name' => 'Vendeurs archivés', 'url' => route('admin.vendors.archived')]);

        if ($request->ajax()) {
            $data = Vendor::query()->onlyTrashed()->WithCount('vendors')->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::actions.btn-archived')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {
                    return $param->created_at;
                })


                ->addColumn('name_ar', function ($vendor) {


                        return '<span class="badge badge-info shadow-sm">'.$vendor->name_ar.'</span> ';

                })
                ->addColumn('name_fr', function ($vendor) {


                        return '<span class="badge badge-info shadow-sm">'.$vendor->name_fr.'</span> ';

                })
                ->addColumn('logo_ar', function ($vendor) {

                    if ($vendor->logo_ar)  return '<a target="_blank" href="'.asset($vendor->logo_ar).'" class="badge badge-info shadow-sm">Voir</a> ';
                        return '<span class="badge badge-info shadow-sm">Aucune</span> ';

                })
                ->addColumn('logo_fr', function ($vendor) {

                    if ($vendor->logo_fr)  return '<a target="_blank" href="'.asset($vendor->logo_fr).'"  class="badge badge-info shadow-sm">Voire</img> ';
                    return '<a class="badge badge-info shadow-sm">Aucune</a> ';

                })
                ->addColumn('is_active', function ($vendor) {

                    if ($vendor->is_active)  return '<span class="badge badge-success shadow-sm">Oui</img> ';
                    return '<span class="badge badge-danger shadow-sm">Non</span> ';

                })

                ->rawColumns(['action','name_ar','name_fr','is_active','logo_fr','logo_ar', 'responsive', 'created_at'])
                ->make(true);

        }

        return view('VendorsUi::index-archived', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendeurs archivés']);
    }

    public function authorize()
    {
        return auth()->user()->can('view_vendor');
    }

}
