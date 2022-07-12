<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\raw;

use App\Models\YalidineMairie;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetCommune
{
    use AsAction;

    public function handle()
    {
        // ...
    }

//    public function authorize()
//    {
//        return \auth()->user()->can('create_client');
//    }

    public function asController(Request $request, $id)
    {

        $communs = DB::table('yalidine_mairies')
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where('yalidine_mairies.name', 'like', "%" . (trim($request->q)) . "%");

            })
            ->where('id_wilaya', $id)
            ->leftJoin('yalidine_wilayas', 'yalidine_mairies.id_wilaya', 'yalidine_wilayas.id')
            ->select('yalidine_mairies.id as id',
                'yalidine_mairies.name as name')
            ->get()->map(function ($commun) {
                return [
                    'id' => $commun->id,
                    'text' => '- ' . $commun->name,

                ];
            });

        return response()->json($communs);

    }


}
