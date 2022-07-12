<?php

namespace App\Modules\ClientsLogic\Controllers\ClientAddress;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreArrayClientAddress
{
    use AsAction;

    public function handle(ActionRequest $request,Client $client)
    {

        $validator = Validator::make($request->all(), [
            'address_liste' => ['required', 'array'],
            'address_liste.address' => ['required', 'array'],
            'address_liste.commune_id' => ['required', 'array'],
            'address_liste.code_postal' => ['nullable', 'array'],


            'address_liste.code_postal.*' => ['nullable', 'numeric','min:0'],
            'address_liste.address.*' => ['required', 'string','max:191'],
            'address_liste.commune_id.*' => ['required', 'string'],

        ],[],[
            'address_liste.address' => 'adresse',
            'address_liste.commune_id' => 'commune ',
            'address_liste.code_postal' => 'code postal',

            'address_liste.address.*' => 'adresse',
            'address_liste.commune_id.*' => 'commune ',
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
        $code_postal = $request->address_liste['code_postal'];

        $count = 0;

        foreach($address as $a){

            ClientAddress::create(['client_id'=>$client->id , 'address' => $a
            , 'commune_id' => $commune[$count]
                , 'code_postal' => $code_postal[$count]]);

            $count++;

        }


        return [
            'success' => true,
            'data' => '',
        ];

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
