<?php

namespace App\Modules\ClientsLogic\Controllers\Contact;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use App\Modules\ClientsLogic\Models\Contact;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteContact
{
    use AsAction;

    public function handle(Contact $contact)
    {
        $contact->delete();
    }

    public function asController(Contact $contact)
    {
        $this->handle($contact);
        Session::flash('message','Contact supprimer avec succès');
        return redirect()->back();
    }

//    public function authorize()
//    {
//        return auth()->user()->can('delete_client');
//    }

}
