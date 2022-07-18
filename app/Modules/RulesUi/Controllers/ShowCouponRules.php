<?php

namespace App\Modules\RulesUi\Controllers;


use App\Models\CouponRule;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowCouponRules
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Coupon règles', 'icon-package', 'blue', 'Liste des règles coupons');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Coupon règles", 'url' => '/admin-dash/coupons-rules']);

        if ($request->ajax()) {

            $data = CouponRule::query()->orderby('created_at', 'desc');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'RulesUi::actions.btn-rules')
                ->addColumn('responsive', function ($product) {
                    return '';
                })
                ->addColumn('created_at', function ($product) {

                    return $product->created_at;

                })
                ->rawColumns(['action', 'responsive', 'created_at'])
                ->make(true);
        }

        return view('RulesUi::index-rules', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => "Coupon | Rules"]);
    }


    /*    public function authorize()
       {
           return auth()->user()->can('view_bon_achat');
       } */

}
