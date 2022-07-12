<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreArrayClientAddressDetail
{
    use AsAction;

    public function handle(ActionRequest $request,Client $client)
    {

        $validator = Validator::make($request->all(), [
            'address_liste' => ['required', 'array'],
            'address_liste.address' => ['required', 'array'],
            'address_liste.commune_id' => ['required', 'array'],
            'address_liste.observation' => ['required', 'array'],
            'address_liste.code_postal' => ['required', 'array'],


            'address_liste.code_postal.*' => ['required', 'numeric'],
            'address_liste.address.*' => ['required', 'string','max:191'],
            'address_liste.observation.*' => ['required', 'string'],
            'address_liste.commune_id.*' => ['required', 'string'],

        ],[],[
            'address_liste.address' => 'adresse',
            'address_liste.commune_id' => 'commune ',
            'address_liste.observation' => 'observation',
            'address_liste.code_postal' => 'code postal',

            'address_liste.address.*' => 'adresse',
            'address_liste.commune_id.*' => 'commune ',
            'address_liste.observation.*' => 'observation',
            'address_liste.code_postal.*' => 'code postal',
        ]);

        if ($validator->fails()) {

            return [
                'success' => false,
                'data' => $validator,
            ];

        }


        $address = $request->address_liste['address'];
        $commune = $request->address_liste['commune_id'];
        $observation = $request->address_liste['observation'];
        $code_postal = $request->address_liste['code_postal'];

        $count = 0;

        foreach($address as $a){

            ClientAddress::create(['client_id'=>$client->id , 'address' => $a
            , 'commune_id' => $commune[$count], 'observation' => $observation[$count]
            , 'code_postal' => $code_postal[$count]]);

            $count++;

        }

        Session::flash('message', 'Addresses ajouté avec succès');

        return redirect()->route('admin.clients.details', base64_encode($client->id));

    }

    private function getClientPieceFields($request): array
    {
        return $request->only(['address_liste']);
    }
/*
    public function rules(): array
    {

        return [
            'address_liste' => ['required', 'array'],
            'address_liste.numero_piece' => ['required', 'array'],
            'address_liste.type_piece' => ['required', 'array'],
            'address_liste.delivery_date' => ['required', 'array'],
            'address_liste.par' => ['required', 'array'],
            'address_liste.place' => ['required', 'array'],
            'address_liste.numero_piece.*' => ['required', 'numeric'],
            'address_liste.type_piece.*' => ['required', 'string','max:191'],
            'address_liste.delivery_date.*' => ['required', 'date','after_or_equal:now'],
            'address_liste.par.*' => ['required', 'string'],
            'address_liste.place.*' => ['required', 'string'],
        ];

    }

    public function getValidationAttributes(): array
    {
        return [
            'address_liste.numero_piece' => 'Numéro de pièce',
            'address_liste.type_piece' => 'Type de pièce',
            'address_liste.delivery_date' => 'Date de délivrance',
            'address_liste.place' => 'Wilaya de délivrance',

            'address_liste.numero_piece.*' => 'Numéro de pièce',
            'address_liste.type_piece.*' => 'Type de pièce',
            'address_liste.delivery_date.*' => 'Date de délivrance',
            'address_liste.place.*' => 'Wilaya de délivrance',
        ];
    } */


}
