<?php

namespace App\Modules\ClientsLogic\Controllers\Coupon;


use App\Modules\ClientsLogic\Models\Client_coupon;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreClientCoupon
{
    use AsAction;


    public function asController(Client_coupon $client_coupon)
    {

        $this->handle($client_coupon);

        Session::flash('message', 'Coupon restauré avec succés');

        return redirect()->back();

    }

    public function handle(Client_coupon $client_coupon)
    {
        $client_coupon->restore();
    }
}
