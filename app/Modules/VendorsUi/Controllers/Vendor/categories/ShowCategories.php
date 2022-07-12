<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\categories;

use App\Models\VendorCategory;
use App\Models\VendorUser;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowCategories
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Catégories', 'icon-award', 'blue', 'Liste des catégorie');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Catégories', 'url' => route('vendor.categories.index')]);

        if ($request->ajax()) {
            $data = VendorCategory::query()
                ->with('category')
                ->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)
                ->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::Vendor.actions.btn-categories')
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

        $categories=Category::query()->where('is_active',1)->get();
        $selected_categories=VendorCategory::query()->where('vendor_id',\auth()->guard('vendor')->user()->vendor_id)->pluck('category_id')->toArray();


        return view('VendorsUi::Vendor.categories.index', compact('selected_categories','categories','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Catégorie']);
    }


}
