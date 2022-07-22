<?php

namespace App\Modules\OrdersLogic\Controllers\raw;


use App\Models\RawOrder;
use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class UpgradeOrder
{
    use AsAction;

    public function asController(ActionRequest $request, RawOrder $order)
    {

        if ($request->phone == 0) {
            Session::flash('error', 'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }
//        TODO change it in the ui when 0 entered auto delete
        foreach ($request->product_list as $req_prod) {
            if ($req_prod['qty'] == 0) {
                Session::flash('error', 'la quantité doit être supérieure à 0');
                throw new \ErrorException('');
            }

        }

        DB::beginTransaction();

        try {
            $this->handle($request, $order);
            DB::commit();
            Session::flash('success', 'Command mis à jour avec succès.');
            return redirect()->route('admin.orders.raw.index');

        } catch (Throwable $exception) {
            DB::rollBack();
            Session::flash('error', 'quelque chose s\'est mal passé.');
            return redirect()->back()->withInput();
        }


    }

    public function handle(ActionRequest $request, RawOrder $order): void
    {


        if ($request->type == 1) {
            $this->handleCreation($request, $order);
        } else {
            $this->handleChosen($request, $order);
        }

    }


    private function handleCreation($request, $order)
    {

        $raw_order_original_products = $order->products;

        foreach ($request->product_list as $req_prod) {
            $raw_order_original_products->where('id', $req_prod['id'])->first()->update([
                'qty' => $req_prod['qty']
            ]);
        }

        $new_sub = $raw_order_original_products->sum(function ($product) {
            return $product->price * $product->qty;
        });

        $order->update([
            'total' =>$new_sub,
            'sub_total' => $new_sub
        ]);


        $request->request->add(['wilaya' => YalidineWilaya::find($request->wilaya_id)->name]);

        $client = Client::query()->firstOrCreate(['phone' => $request->phone], [
            'password' => Hash::make('123456789'),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'commune_id' => $request->commune_id,
            'wilaya' => $request->wilaya,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        $address = $client->client_address->first();

        if (!$address) {

            $address = ClientAddress::query()->create([
                'address' => $request->address??$order->address,
                'commune_id' => $request->commune_id,
                'client_id' => $client->id
            ]);

        }


        $order_new = Order::query()->create([
            'status' => 'confirmed',
            'client' => $client->id,
            'sub_total' => $order->sub_total,
            'total' => $order->total+$order->shipping,
            'shipping' => $order->shipping,
            'updated_by' => auth()->id(),
            'address_id' => $address->id,
            'tracking_code'=>$order->tracking_code,
            'vendor_id'=>$order->vendor_id
        ]);

        foreach ($raw_order_original_products as $product) {
            Order_product::query()->create([
                'product_id' => $product->product_id,
                'price' => $product->price,
                'order_id' => $order_new->id,
                'quantity' => $product->qty,
            ]);
        }


        $order->delete();


    }

    private function handleChosen($request, $order)
    {


        $raw_order_original_products = $order->products;

        foreach ($request->product_list as $req_prod) {
            $raw_order_original_products->where('id', $req_prod['id'])->first()->update([
                'qty' => $req_prod['qty']
            ]);

        }


        $new_sub = $raw_order_original_products->sum(function ($product) {
            return $product->price * $product->qty;
        });

        $order->update([
            'total' => $new_sub,
            'sub_total' => $new_sub
        ]);


        $client = Client::query()->findOrFail($request->client_id);
        $address = $client->client_address->first();
        if (!$address) {
            $address = ClientAddress::query()->create([
                'address' => $order->address,
                'commune_id' => YalidineMairie::query()->where('name', 'like', '%' . $order->commune . '%')->firstOrFail()->id,
                'client_id' => $client->id
            ]);
        }

        $order_new = Order::query()->create([
            'status' => 'confirmed',
            'client' => $client->id,
            'sub_total' => $order->sub_total,
            'total' => $order->total+$order->shipping,
            'shipping' => $order->shipping,
            'updated_by' => auth()->id(),
            'address_id' => $address->id,
            'tracking_code'=>$order->tracking_code,
            'vendor_id'=>$order->vendor_id
        ]);

        foreach ($raw_order_original_products as $product) {
            Order_product::query()->create([
                'product_id' => $product->product_id,
                'price' => $product->price,
                'order_id' => $order_new->id,
                'quantity' => $product->qty,
            ]);
        }

        $order->delete();

    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);

    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) === 14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) === 13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) === 13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) === 12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) === 10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) === 9) return $phone;
        else return 0;
    }

    public function rules(): array
    {
        if (request()->type == 0) {
            return [
                'product_list' => ['required', 'array'],
                'product_list.id.*' => ['required', 'exists:product_coupons,id'],
                'product_list.qty.*' => ['required', 'numeric', 'min:1'],

                'client_id' => ['required', 'exists:clients,id']
            ];
        }

        return [
            'product_list' => ['required', 'array'],
            'product_list.id.*' => ['required', 'exists:product_coupons,id'],
            'product_list.qty.*' => ['required', 'numeric', 'min:1'],


            'first_name' => ['required', 'string', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'last_name' => ['required', 'string', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'commune_id' => ['required'],
            'wilaya_id' => ['required'],
            'address' => ['required'],
            'phone' => ['required', new PhoneNumber],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'status' => 'statut',
        ];
    }

    public function authorize()
    {
        return auth()->user()->can('edit_raw_order');
    }

}
