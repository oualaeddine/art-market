<?php

namespace App\Modules\OrdersLogic\Controllers;

use ErrorException;
use GuzzleHttp\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class GenerateCoupon
{
    use AsAction;

    public function asController(ActionRequest $request, Order $order)
    {

        DB::beginTransaction();

        try {
            $order->load('clientRelation','address.commune.wilaya');
            $response = $this->handleApiRequest($request, $order);
            if ($response->getStatusCode() != 200) {
                dd($response);
                throw new ErrorException('');
            }
            $decoded_response=json_decode($response->getBody(),false);
            Client_coupon::create(['client_id' => $order->client, 'coupon' => $decoded_response->data->coupon, 'value' => $decoded_response->data->value]);

            $order->update([
               'status'=>'completed'
            ]);
            DB::commit();

            Session::forget('token_coupon');

            Session::flash('success', 'Status mis à jour avec succès.');

            return redirect()->route('admin.orders.index');
        } catch (Throwable $e) {

            DB::rollBack();
            Session::flash('error', "quelque chose s'est mal passé, vérifiez et réessayez ");

            return redirect()->route('admin.orders.coupons', $order->id);
        }


    }

    private function handleApiRequest($request, $order)
    {
        $url='https://kados.coodivteam.com/api/V1/get/coupon';
        $client = new Client();
//        $url = 'http://127.0.0.1:8001/api/V1/get/coupon';
        $data = [
            "first_name" => $order->clientRelation->first_name,
            "last_name" => $order->clientRelation->last_name,
            "commune_id" => $order->address->commune_id ?? null,
            "wilaya" => $order->address->commune->wilaya->name ?? null,
            "phone" => $order->clientRelation->phone,
            "family_id" => $request->family_id,
            "store_rf" => 'Store Ref' // to get it later from env
        ];
        return $client->post($url,
            [
                'timeout' => 30, // Response timeout
                'decode_content' => false,
                'headers' =>
                    ['Authorization' => "Bearer " . Session::get('token_coupon'),
                        'X-Authorization' => 'UkXp2s5v8y/B?E(H+KbPeShVmYq3t6w9z$C&F)J@NcQfTjWnZr4u7x!A%D*G-KaP',
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ],
                'body' => json_encode($data)
            ]);


    }

    public function rules(): array
    {
        return ['family_id' => ['nullable'],];
    }

    public function getValidationAttributes(): array
    {
        return ['family_id' => 'Famille de coupon',];
    }


}
