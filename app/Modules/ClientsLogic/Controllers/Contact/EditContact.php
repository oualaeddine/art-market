<?php

namespace App\Modules\ClientsLogic\Controllers\Contact;


use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use App\Modules\ClientsLogic\Models\Contact;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class EditContact
{
    use AsAction;

    public function handle(Contact $contact)
    {
        return [
           'cmnt' =>$contact->comment,
            'status'=>$contact->status
        ];
    }


//    public function authorize()
//    {
//        return auth()->user()->can('delete_client');
//    }

}
