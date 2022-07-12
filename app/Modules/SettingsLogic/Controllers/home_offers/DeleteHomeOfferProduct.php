<?php

namespace App\Modules\SettingsLogic\Controllers\home_offers;


use App\Models\HomeOffer;
use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteHomeOfferProduct
{
    use AsAction;

    public function asController(ActionRequest $request, HomeOffer $offer)
    {

        $this->handle($request, $offer);

        Session::flash('message', 'Produit supprimé avec succès');
        return redirect()->back();
    }

    public function handle(ActionRequest $request, HomeOffer $offer)
    {
        $offer->delete();
    }


}
