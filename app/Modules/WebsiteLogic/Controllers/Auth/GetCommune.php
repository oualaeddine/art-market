<?php

namespace App\Modules\WebsiteLogic\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCommune
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request, $id)
    {



        $communs = DB::table('yalidine_mairies')
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where('yalidine_mairies.name', 'like', "%" . (trim($request->q)) . "%")
                    ->Orwhere('yalidine_mairies.name_ar', 'like', "%" . (trim($request->q)) . "%");

            })
            ->where('id_wilaya', $id)
            ->leftJoin('yalidine_wilayas', 'yalidine_mairies.id_wilaya', 'yalidine_wilayas.id')
            ->select('yalidine_mairies.id as id',
                'yalidine_mairies.name as name',
                'yalidine_mairies.name_ar as name_ar'

            )
            ->get()->map(function ($commun){
                if (app()->getLocale()=='ar'){
                    $name=$commun->name_ar??$commun->name;
                }else{
                    $name=$commun->name;
                }
                return [
                    'id' => $commun->id,
                    'text' => '- ' . $name,

                ];
            });

        return response()->json($communs);

    }


}
