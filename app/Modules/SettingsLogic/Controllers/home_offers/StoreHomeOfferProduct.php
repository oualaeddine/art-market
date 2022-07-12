<?php

namespace App\Modules\SettingsLogic\Controllers\home_offers;


use App\Models\HomeOffer;
use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreHomeOfferProduct
{
    use AsAction;

    public function asController(ActionRequest $request, Client $client)
    {

        $this->handle($request, $client);

        Session::flash('message', 'Produit ajouté avec succès');
        return redirect()->back();
    }

    public function handle(ActionRequest $request, Client $client)
    {
        HomeOffer::query()->updateOrCreate([
            'product_id' => $request->product_id,
        ], [
            'product_id' => $request->product_id,
        ]);
    }


    public function rules(): array
    {
        return [
            'product_id' => ['required', Rule::exists('products', 'id')],
        ];
    }

}
