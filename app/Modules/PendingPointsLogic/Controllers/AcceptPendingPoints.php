<?php

namespace App\Modules\PendingPointsLogic\Controllers;

use App\Modules\ClientsLogic\Models\Client_wallet;
use App\Modules\PendingPointsLogic\Models\ClientPendingPoint;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class AcceptPendingPoints
{
    use AsAction;


    public function asController(ClientPendingPoint $point)
    {
        $this->handle($point);
        Session::flash('success', 'Points en attente mis à jour avec succès.');
        return redirect()->route('admin.points.index');
    }


    public function handle(ClientPendingPoint $point)
    {

        $point->update(['status' => 'accepted']);
        Client_wallet::query()->where('client_id', $point->client_id)->increment('amount', $point->amount);
        $point->delete();

    }

}
