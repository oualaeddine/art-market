<?php

namespace App\Modules\RulesLogic\Controllers;

use App\Models\CouponRule;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCouponRule
{
    use AsAction;

    public function asController(CouponRule $rule)
    {

        $this->handle($rule);
        Session::flash('success', 'Regle supprimé avec succès.');
        return redirect()->back();
    }

    public function handle($rule): void
    {
        $rule->delete();
    }


}
