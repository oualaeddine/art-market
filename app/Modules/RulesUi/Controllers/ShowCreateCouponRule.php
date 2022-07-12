<?php

namespace App\Modules\RulesUi\Controllers;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowCreateCouponRule
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {


        $header = GenerateHeader::run('Produits', 'icon-package', 'blue', 'Ajouter un produit');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Coupon règles", 'url' => '/cod-dash/coupons-rules'],['name' => "Ajouter une regle", 'url' => route('admin.coupons.rules.create')]);

        return view('RulesUi::pages.rule.create', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Rule | create"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
