<?php

namespace App\Modules\VendorsUi\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowVendors
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Vendeurs', 'icon-award', 'blue', 'Liste des vendeurs');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Vendeurs', 'url' => route('admin.vendors.index')]);

        if ($request->ajax()) {
            $data = Vendor::query()->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::actions.btn')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {
                    return $param->created_at;
                })


                ->addColumn('namear', function ($vendor) {


                        return '<span class="badge badge-info shadow-sm">'.$vendor->name_ar.'</span> ';

                })
                ->addColumn('namefr', function ($vendor) {


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

                ->rawColumns(['action','namear','namefr','is_active','logo_fr','logo_ar', 'responsive', 'created_at'])
                ->make(true);

        }

        return view('VendorsUi::index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendeurs']);
    }


}
