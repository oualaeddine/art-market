<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Models\User;
use App\Modules\ClientsLogic\Models\Client;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class EditProfile
{
    use AsAction;


    public function handle(ActionRequest $request, Client $client)
    {
    }

    public function asController(ActionRequest $request, Client $client)
    {

        return view('', ['client' => $client]);
    }


}
