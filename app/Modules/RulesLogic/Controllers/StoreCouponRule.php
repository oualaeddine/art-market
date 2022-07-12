<?php

namespace App\Modules\RulesLogic\Controllers;

use App\Models\CouponRule;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreCouponRule
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        $this->handle($request);

        Session::flash('success', 'Regle ajouté avec succès.');
        return redirect()->route('admin.coupons.rules.index');
    }

    public function handle(ActionRequest $request)
    {

        CouponRule::query()->create($this->getRuleFields($request));

    }

    private function getRuleFields($request): array
    {
        return $request->only([
            'min',
            'max',
            'points',
        ]);
    }

    public function rules(): array
    {
        return [
            'max' => 'required|numeric',
            'min' => 'required|numeric',
            'points' => 'required|numeric',
        ];
    }


}
