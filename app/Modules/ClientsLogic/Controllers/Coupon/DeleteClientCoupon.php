<?php

namespace App\Modules\ClientsLogic\Controllers\Coupon;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\CouponFamilyLogic\Models\Coupon_family;
use App\Modules\CouponsLogic\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteClientCoupon
{
    use AsAction;


    public function handle(ActionRequest $request, Client_coupon $coupon)
    {
        $coupon->delete();
        Session::flash('message','Coupon archivé avec succès.');
        return redirect()->back();
    }


}
