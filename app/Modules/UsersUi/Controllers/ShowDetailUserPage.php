<?php

namespace App\Modules\UsersUi\Controllers;

use App\Models\User;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class ShowDetailUserPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request, User $user)
    {

        $header = GenerateHeader::run("Détail de l'utilisateur ({$user->name})", 'icon-user', 'blue', 'Liste des détails de l\'utilisateur' );

        $user_info = Auth::user();
        $selected_roles = $user->roles()->get()->pluck('id')->toArray();
        $roles =Role::query()->where('guard_name','web')->get();


        $breadcrumbs = array(['name' => "Utilisateurs", 'url' => route('admin.users.index')], ['name' => "Détail de l'utilisateur", 'url' => "#"]);
        $permissions = $user->load('roles.permissions')->roles;
        return view('UsersUi::detail', compact('header', 'permissions','roles','selected_roles', 'roles', 'user', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Modifier un utilisateur']);
    }

    public function authorize()
    {
        return auth()->user()->can('edit_user_profile');
    }


}
