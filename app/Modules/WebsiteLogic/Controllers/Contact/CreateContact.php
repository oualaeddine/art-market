<?php

namespace App\Modules\WebsiteLogic\Controllers\Contact;

use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\ClientsLogic\Models\Contact;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContact
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }


    public function asController(ActionRequest $request, Client $client)
    {


        $this->handle($request, $client);

        Session::flash('message', 'Contact ajouté avec succès');

        return redirect()->back();

    }

    public function handle(ActionRequest $request,  Client $client)
    {
        Contact::create($this->getContactFields($request));
    }


    private function getContactFields($request): array
    {
        return $request->only(['message','name','phone']);
    }

    public function rules(): array
    {
        return [
            'message' => ['required','max:255'],
            'name' => ['required','max:255'],
            'phone' => ['required'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'message' => 'message',
            'name' => 'nom',
            'phone' => 'Téléphone',
        ];
    }
}
