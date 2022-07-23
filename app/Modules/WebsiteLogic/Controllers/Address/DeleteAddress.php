<?php

namespace App\Modules\WebsiteLogic\Controllers\Address;


use App\Modules\ClientsLogic\Models\ClientAddress;
use Brian2694\Toastr\Facades\Toastr;
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
        Toastr::success(trans('Address deleted successfully'), '', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back()->with(['tab'=>'address']);

    }

    public function handle(ClientAddress $client_address)
    {
        $client_address->delete();
    }
}
