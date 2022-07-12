<?php

namespace App\Modules\WebsiteLogic\Controllers\CheckOut;

use App\Models\User;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Checkout
{
    use AsAction;


    public function handle(ActionRequest $request,Client $client)
    {
        $product=Product::query()->findOrFail($request->product_id);

        Order::query()->create([
            'ref'=>$product->ref,
            'phone'=>$request->filled('phone')??$client->phone,
            'name'=>$client->first_name,
            'last_name'=>$client->last_name,
            'product_id'=>$product->id,
            'client'=>$client->id,
            'wilaya_id'=>$request->wilaya_id
        ]);

    }

    public function asController(ActionRequest $request,Client $client)
    {
        $this->handle($request,$client);
        Session::flash('message', 'Checkout avec succés');

        return redirect()->back();

    }


    public function rules(): array
    {

        return [
            'product_id' => ['required','exists:products,id'],
            'wilaya_id' => ['required', 'exists:yalidine_wilayas,id'],
            'phone'=>['nullable','sometimes'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'product_id' => 'Produit',
            'wilaya_id' => 'Wilaya',
            'phone' => 'Téléphone',
        ];
    }


}
