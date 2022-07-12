<?php

namespace App\Modules\OrdersUi\Controllers;

use App\Models\ProductCoupon;

use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetClients
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {


        $communs = DB::table('clients')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('clients.first_name', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('clients.last_name', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('clients.phone', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('clients.email', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('clients.phone', 'like', "%" . (trim(explode('0',$request->q,2)[1]??'a')) . "%")
                ;
            })
            ->select('clients.id as id',
                'clients.first_name as first_name',
                'clients.last_name as last_name',
                'clients.phone as phone'
            )
            ->get()->map(function ($client) {
                return [
                    'id' => $client->id,
                    'text' =>'Nom : '.$client->last_name.' | Prénom : '.$client->first_name.' | Téléphone : 0'.$client->phone,

                ];
            });

        return response()->json($communs);


    }



}
