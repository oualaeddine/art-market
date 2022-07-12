<?php

namespace App\Modules\WebsiteLogic\Controllers\Address;


use App\Modules\ClientsLogic\Models\ClientAddress;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteAddress
{
    use AsAction;

//    public function authorize()
//    {
//        return auth()->user()->can('edit_detail_client');
//    }

    public function asController(ClientAddress $client_address)
    {

        $this->handle($client_address);
        Session::flash('message', Session::get('client_lang')?'تم حذف العنوان بنجاح': 'Adresse supprimé avec succés');

        Session::put(['profile_tab'=>'profile-tab']);
        return redirect()->back();

    }

    public function handle(ClientAddress $client_address)
    {
        $client_address->delete();
    }
}
