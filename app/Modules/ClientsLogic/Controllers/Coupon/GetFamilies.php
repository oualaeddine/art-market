<?php

namespace App\Modules\ClientsLogic\Controllers\Coupon;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetFamilies
{
    use AsAction;


    public function handle(ActionRequest $request)
    {
        $url='https://kados.coodivteam.com/api/V1/get/families';
        $client = new Client();

//        $url   = 'http://127.0.0.1:8001/api/V1/get/families';
        $data   = [
            "email"    => 'superDzadmin@gmail.com',
            "password" => '$A1Fw?%$y$'
        ];

        $requestAPI = $client->get( $url, [
            'timeout' => 30, // Response timeout
            'headers' => [
                'X-Authorization' => 'UkXp2s5v8y/B?E(H+KbPeShVmYq3t6w9z$C&F)J@NcQfTjWnZr4u7x!A%D*G-KaP',
                'Content-Type'  => 'application/json',
                'Accept'=> 'application/json'
            ],
            'body' => json_encode($data),
        ]);

        $res = json_decode($requestAPI->getBody(), false);

        Session::put('token_coupon',$res->data->token);


        return $res;

    }


}
