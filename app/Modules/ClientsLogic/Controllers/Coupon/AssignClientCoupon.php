<?php

namespace App\Modules\ClientsLogic\Controllers\Coupon;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_coupon;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignClientCoupon
{
    use AsAction;

    public function asController(ActionRequest $request,Client $client)
    {

        DB::beginTransaction();

        try {
            $response = $this->handleApiRequest($request);
            if ($response->getStatusCode() != 200) {
                throw new \ErrorException('');
            }
            $decoded_response=json_decode($response->getBody(),false);
            Client_coupon::create(['client_id' => $client->id, 'coupon' => $decoded_response->data->coupon->code, 'value' => $decoded_response->data->coupon->value]);

            DB::commit();

            Session::flash('success', 'Coupon ajouté avec succès.');

            return redirect()->back();
        } catch (\Throwable $e) {

            DB::rollBack();

            Session::flash('error', "quelque chose s'est mal passé, vérifiez et réessayez ");

            return redirect()->back();
        }


    }


    private function handleApiRequest($request)
    {
        $url='https://kados.coodivteam.com/api/V1/assign/coupon';
        $client_api = new \GuzzleHttp\Client();
//        $url = 'http://127.0.0.1:8001/api/V1/assign/coupon';
        $data = [
            "family_id" => $request->family_id,
            "store_rf" => 'just test' // to get it later from env
        ];
        return $client_api->post($url,
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
        return [
            'family_id' => ['required'],
            'store_rf' => ['required', 'string', 'max:45']
        ];
    }

    public function getValidationAttributes(): array
    {
        return ['address' => 'address', 'observation' => 'observation', 'code_postal' => 'code postal', 'commune_id' => 'commune',];
    }
}
