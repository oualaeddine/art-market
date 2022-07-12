<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\normal;



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
                return redirect()->route('vendor.orders.coupons',$order->id);

            }
        } catch (Throwable $exception) {
            DB::rollBack();
            Session::flash('error', 'Quelque chose s\'est mal passé.');
        }

        return redirect()->route('vendor.orders.index');

    }

    public function handle(ActionRequest $request, Order $order)
    {

        if($request->status=='completed' && ($order->status!=='completed')){

            return 'send_to_delivery';

        }else{

            return $order->update($this->getOrderFields($request));

        }



    }

    private function getOrderFields($request): array
    {
        return $request->only([
            'status',
            'details',
        ]);
    }

    private function checkIsConfirmed($request, $order)
    {
        if ($request->status === 'confirmed' && !($order->status === 'confirmed')) {

            $this->createClientAndWallet($order);
        }

    }

    private function createClientAndWallet($order)
    {
        $client = Client::query()->firstOrCreate([
            'phone' => $order->phone
        ], [
            'first_name' => $order->name,
            'last_name' => $order->name,
            'commune_id' => $order->commune_id ?? null,
            'wilaya' => YalidineWilaya::query()->find($order->wilaya_id)->name ?? null,
            'phone' => $order->phone,
            'password' => Hash::make(123456789)
        ]);

        $order->client = $client->id;

        return $client;
    }

    private function checkIsDelivered($request, $order)
    {

        if ($request->status === 'completed' && !($order->status === 'completed')) {
           return true;
        }else{
            return false;
        }

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


}
