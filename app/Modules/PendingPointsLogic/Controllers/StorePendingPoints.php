<?php

namespace App\Modules\PendingPointsLogic\Controllers;

use App\Modules\PendingPointsLogic\Models\ClientPendingPoint;
use Lorisleiva\Actions\Concerns\AsAction;

class StorePendingPoints
{
    use AsAction;


    public function handle($client, $amount)
    {
        ClientPendingPoint::query()->create([
            'amount' => $amount,
            'client_id' => $client->id,
        ]);
    }


}
