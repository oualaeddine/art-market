<?php

namespace App\Modules\ClientsLogic\Controllers\Contact;

use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\ClientsLogic\Models\Contact;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateContact
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }


    public function asController(ActionRequest $request, Contact $contact)
    {


        $this->handle($request, $contact);

        Session::flash('message', 'Contact mis à jour avec succès');

        return redirect()->back();

    }

    public function handle(ActionRequest $request, Contact $contact)
    {
        $contact->update($this->getContactFields($request));
    }


    private function getContactFields($request): array
    {
        return $request->only(['status', 'comment']);
    }

    public function rules(): array
    {
        return [
            'status' => ['required','in:Pending,Done'],
            'comment' => ['nullable','sometimes','max:255'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'status' => 'statut',
            'comment' => 'Commentaire',
        ];
    }
}
