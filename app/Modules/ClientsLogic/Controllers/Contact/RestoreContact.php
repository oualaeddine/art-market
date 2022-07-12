<?php

namespace App\Modules\ClientsLogic\Controllers\Contact;


use App\Modules\ClientsLogic\Models\Contact;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreContact
{
    use AsAction;

    public function asController(Contact $contact)
    {
        $this->handle($contact);
        Session::flash('message', 'Contact restaurer avec succès');
        return redirect()->back();
    }

    public function handle(Contact $contact)
    {
        $contact->restore();
    }

//    public function authorize()
//    {
//        return auth()->user()->can('delete_client');
//    }

}
