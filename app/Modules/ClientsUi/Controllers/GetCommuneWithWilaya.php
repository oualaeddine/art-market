<?php

namespace App\Modules\ClientsUi\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;


class GetCommuneWithWilaya
{
    use AsAction;

    public function handle()
    {
        // ...
    }



    public function asController(Request $request)
    {


        $communs = DB::table('yalidine_mairies')
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where('yalidine_mairies.name', 'like', "%" . (trim($request->q)) . "%");

            })
            ->leftJoin('yalidine_wilayas', 'yalidine_mairies.id_wilaya', 'yalidine_wilayas.id')
            ->select('yalidine_mairies.id as id',
                'yalidine_wilayas.name as wilaya_name',
                'yalidine_mairies.name as name')
            ->get()->map(function ($commun) {

                return [
                    'id' => $commun->id,
                    'text' => $commun->wilaya_name.' - ' . $commun->name,

                ];
            });

        return response()->json($communs);

    }


}
