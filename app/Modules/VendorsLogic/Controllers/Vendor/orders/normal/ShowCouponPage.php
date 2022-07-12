<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\normal;


use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\Extra\GenerateHeader;
use App\Modules\ProductsLogic\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ShowCouponPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Order $order)
    {

        $header = GenerateHeader::run("Generation de coupon", 'icon-box', 'yellow', "Generation de coupon");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Commandes", 'url' => '/cod-dash/commandes'],['name' => "Generation de coupon", 'url' => '/cod-dash/commandes/'.$order->id.'/generate-coupon']);

        try{
            $url='https://kados.coodivteam.com/api/V1/get/families?email=superDzadmin@gmail.com&password=$A1Fw?%$y$';
            $client = new Client();
//            $url   = 'http://127.0.0.1:8001/api/V1/get/families';
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

        }catch(Throwable $e){
            Session::flash('error',"quelque chose s'est mal passé");
                dd($e->getMessage());
            return redirect()->back();

        }

        if($res->status == 'Success'){

            $families = $res->data->families;
            Session::put('token_coupon',$res->data->token);

        }else{

            Session::flash('error',"quelque chose s'est mal passé");

            return redirect()->back();

        }

        return view('VendorsUi::Vendor.orders.normal.coupon-generation', compact('header', 'user_info','breadcrumbs','families','order'))->with(['page_title' => "Commandes"]);

    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
