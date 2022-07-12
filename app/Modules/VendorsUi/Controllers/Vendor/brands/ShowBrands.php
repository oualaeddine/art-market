<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\brands;

use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Models\VendorUser;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowBrands
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Marques', 'icon-award', 'blue', 'Liste des marques');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Marques', 'url' => route('vendor.brands.index')]);

        if ($request->ajax()) {
            $data = VendorBrand::query()
                ->with('brand')
                ->where('vendor_id', \auth()->guard('vendor')->user()->vendor_id)
                ->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::Vendor.actions.btn-brands')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })
                ->addColumn('is_active', function ($user) {

                    if ($user->is_active) return '<span class="badge badge-info">Oui</span>';
                    return '<span class="badge badge-danger">Non</span>';

                })
                ->rawColumns(['action','is_active','responsive', 'created_at'])
                ->make(true);


        }

        $brands=Brand::query()->get();
        $selected_brands=VendorBrand::query()->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)->pluck('brand_id')->toArray();


        return view('VendorsUi::Vendor.brands.index', compact('selected_brands','brands','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Marque']);
    }


}
