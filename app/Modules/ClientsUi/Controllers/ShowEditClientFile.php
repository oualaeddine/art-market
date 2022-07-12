<?php

namespace App\Modules\ClientsUi\Controllers;

use App\Models\ClientFile;
use App\Models\ClientFileType;
use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowEditClientFile
{
    use AsAction;

    public function handle()
    {
        // ...
    }


    public function authorize()
    {
        return auth()->user()->can('view_client');
    }

    public function asController(Request $request, ClientFile $client_file)
    {
        $header = GenerateHeader::run('Documents dossier facilité', 'icon-users', 'blue', 'Modifier documents dossier facilité');

        $user_info = Auth::user();

        $breadcrumbs = array(
            ['name' => 'Clients', 'url' => route('admin.clients.index')],
            ['name' => 'Détails du client', 'url' => route('admin.clients.special', ['client' => $client_file->client_id])],
            ['name' => 'Modifier document facilité', 'url' => route('admin.clients.edit-file', ['client_file' => $client_file->id])],
        );

        $file_types = ClientFileType::get();
        return view('ClientsUi::pages.file.edit', compact('client_file', 'file_types', 'header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Edit Client File']);
    }


}
