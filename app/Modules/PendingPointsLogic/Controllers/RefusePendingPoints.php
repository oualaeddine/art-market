<?php

namespace App\Modules\PendingPointsLogic\Controllers;

use App\Modules\PendingPointsLogic\Models\ClientPendingPoint;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class RefusePendingPoints
{
    use AsAction;

    public function asController(ActionRequest $request, ClientPendingPoint $point)
    {
        $this->handle($request, $point);
        Session::flash('success', 'Points en attente mis à jour avec succès.');
        return redirect()->route('admin.points.index');
    }


    public function handle(ActionRequest $request, ClientPendingPoint $point)
    {

        $point->update(['status' => 'refused']);
        $point->delete();

    }

}
