<?php

namespace App\Modules\OrdersLogic\Controllers;

use App\Models\CouponRule;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_wallet;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\PendingPointsLogic\Controllers\StorePendingPoints;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class UpdateOrder
{
    use AsAction;

    public function asController(ActionRequest $request, Order $order)
    {
        DB::beginTransaction();
        try {
            $response = $this->handle($request, $order);
            Session::flash('success', 'Command mis à jour avec succès.');


            DB::commit();

            if($response === "send_to_delivery"){

                return redirect()->route('admin.orders.coupons',$order->id);

            }
        } catch (Throwable $exception) {
            DB::rollBack();
            Session::flash('error', 'Quelque chose s\'est mal passé.');
        }

        return redirect()->back();
    }

    public function handle(ActionRequest $request, Order $order)
    {




        if($request->status=='completed' && ($order->status!=='completed')){

            return 'send_to_delivery';

        }else{

            return $order->update($this->getOrderFields($request) + ['updated_by' => \auth()->id()]);

        }



    }

    private function getOrderFields($request): array
    {
        return $request->only([
            'status',
            'details',
        ]);
    }


    private function sendSms($client)
    {
        return '';
    }

    private function createCouponsSignedUrl($client)
    {
        return '';
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:confirmed,canceled,pending,completed',
            'details' => 'nullable|string|max:65000',
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'status' => 'statut',
            'details' => 'détail',
        ];
    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'commune_id', 'wilaya', 'phone', 'email']);
    }


}
