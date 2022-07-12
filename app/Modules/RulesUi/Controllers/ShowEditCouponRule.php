<?php

namespace App\Modules\RulesUi\Controllers;

use App\Models\CouponRule;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowEditCouponRule
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request, CouponRule $rule)
    {


        $header = GenerateHeader::run('Coupons regles', 'icon-package', 'blue', 'Modifier une regle');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Regles", 'url' => route('admin.coupons.rules.index')], ['name' => "Modifier une regle", 'url' => route('admin.coupons.rules.edit', ['rule' => $rule->id])]);


        return view('RulesUi::pages.rule.edit', compact('header', 'user_info', 'breadcrumbs', 'rule'))->with(['page_title' => "Regle | edit"]);

    }


    /*    public function authorize()
       {
           return auth()->user()->can('view_bon_achat');
       } */

}
