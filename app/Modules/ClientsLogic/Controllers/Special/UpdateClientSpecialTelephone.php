<?php

namespace App\Modules\ClientsLogic\Controllers\Special;

use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateClientSpecialTelephone
{
    use AsAction;


    public function rules(): array
    {
        return [
            'phone' => ['required']
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'phone' => 'téléphone',
        ];

    }

    public function asController(ActionRequest $request, Client $client)
    {
        $this->handle($request, $client);

        Session::flash('message', 'Client mis à jour avec succés');

        return redirect()->back();
    }

    public function handle(ActionRequest $request, Client $client)
    {
        $client->update(['phone' => $request->phone]);


    }

    private function getClientSpecialTeleFields($request): array
    {
        return $request->only(['observation']);
    }

//    public function authorize()
//    {
//        return auth()->user()->can('view_detail_client');
//    }


}
