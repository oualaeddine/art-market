<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\ClientFile;
use App\Models\ClientFileType;
use App\Models\Modality;
use App\Models\P_param;
use App\Models\Product;
use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPiece;
use App\Modules\ClientsLogic\Models\ClientProfile;
use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowClientDetails
{
    use AsAction;

    public function handle()
    {
        // ...
    }
    public function authorize( )
    {
        return \auth()->user()->can('edit_detail_client');
    }

    public function asController(Request $request,$id)
    {
        $id = base64_decode($id);

        $client = Client::findorfail($id);

        $header = GenerateHeader::run('Détails du client ('.$client->first_name.' '.$client->last_name.' )', 'icon-users', 'blue', 'Liste des détails du client');
        $breadcrumbs = array(['name' => 'Clients', 'url' => '/cod-dash/clients'],['name' => 'Détails du client', 'url' => route('admin.clients.details',['id'=>base64_encode($id)])]);

        $user_info = Auth::user();
        $wilayas = YalidineWilaya::get();



        $client_phones = DB::table('client_phones')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');

        $client_profile = ClientProfile::where('client_id',$id)->whereNull('deleted_at')->wherehas('secteur')->with('secteur')->paginate('5');

        $client_pieces = ClientPiece::query()->with(['wilaya','commune'])->where('client_id',$id)->paginate('5');

        $client_contact_info = DB::table('client_contact_info')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');

        $client_files = ClientFile::query()->with(['type'])->where('client_id',$id)->paginate('5');


        if($request->ajax())
        {
            switch($request->for_item){
                case('phones'):
                    $client_phones = DB::table('client_phones')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');
                    return view('ClientsUi::details', compact('client_phones','client'))->render();
                    break;

                case('profile'):
                    $client_profile = ClientProfile::where('client_id',$id)->whereNull('deleted_at')->wherehas('secteur')->with('secteur')->paginate('5');
                    return view('ClientsUi::details', compact('client_profile','client'))->render();
                    break;

                case('pieces'):
                    $client_pieces = DB::table('client_pieces')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');
                    return view('ClientsUi::details', compact('client_pieces','client'))->render();
                    break;

                case('contact_info'):
                    $client_contact_info = DB::table('client_contact_info')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');
                    return view('ClientsUi::details', compact('client_contact_info','client'))->render();
                    break;

                    case('file'):
                        $client_files = DB::table('client_contact_info')->whereNull('deleted_at')->where('client_id',$id)->paginate('5');
                    return view('ClientsUi::details', compact('client_files','client'))->render();
                    break;
            }
        }
        $file_types=ClientFileType::all();
        return view('ClientsUi::details', compact('client_files','file_types','header','wilayas','user_info','breadcrumbs','client','client_phones','client_profile','client_pieces','client_contact_info'))->with(['page_title' => 'Détails de client']);
    }




}
