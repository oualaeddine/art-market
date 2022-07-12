<?php

use App\Modules\UsersLogic\RolesAndPermissions\Controllers\AssignPermissionsToRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\RevokeRolePermissions;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\AddRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\DeleteRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\EditRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\UpdateRole;
use App\Modules\UsersLogic\User\Controllers\User\ArchiveUser;
use App\Modules\UsersLogic\User\Controllers\User\BlockUser;
use App\Modules\UsersLogic\User\Controllers\User\DeleteUser;
use App\Modules\UsersLogic\User\Controllers\User\EditUser;
use App\Modules\UsersLogic\User\Controllers\User\StoreUser;
use App\Modules\UsersLogic\User\Controllers\User\UnArchiveUser;
use App\Modules\UsersLogic\User\Controllers\User\UnblockUser;
use App\Modules\UsersLogic\User\Controllers\User\UpdateUser;
use App\Modules\UsersLogic\User\Controllers\User\UpdateUserRoles;
use App\Modules\UsersUi\Controllers\ShowDetailUserPage;
use App\Modules\UsersUi\Controllers\ShowPermissionPage;
use App\Modules\UsersUi\Controllers\ShowRolesPage;
use App\Modules\UsersUi\Controllers\ShowUsersPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

    Route::get('/', ShowUsersPage::class)->name('index');
    Route::post('store', StoreUser::class)->name('store');
    Route::delete('{user}/delete', DeleteUser::class)->withTrashed()->name('delete');
    Route::put('{user}/update', UpdateUser::class)->withTrashed()->name('update');
    Route::get('edit/{user}', EditUser::class)->withTrashed()->name('edit');

    Route::get('{user}/detail', ShowDetailUserPage::class)->withTrashed()->name('detail');
    Route::put('{user}/roles/update', UpdateUserRoles::class)->withTrashed()->name('update-roles');
    Route::put('{user}/block', BlockUser::class)->name('block')->withTrashed();
    Route::put('{user}/unBlock', UnblockUser::class)->name('unblock');

    Route::put('{user}/archive', ArchiveUser::class)->name('archive');
    Route::put('{user}/unArchive', UnArchiveUser::class)->withTrashed()->name('unarchive');

});


Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('', ShowRolesPage::class)->name('index');
    Route::post('store', AddRole::class)->name('store');
    Route::get('{role}/edit', EditRole::class)->name('edit');
    Route::put('{role}/update', UpdateRole::class)->name('update');
    Route::delete('{role}/delete', DeleteRole::class)->name('delete');
//
    Route::put('{role}/assign-permissions', AssignPermissionsToRole::class)->name('assign-permission');
//
    Route::put('{role}/revoke-permission', RevokeRolePermissions::class)->name('revoke-permission');

});
Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
//
    Route::get('', ShowPermissionPage::class)->name('index');
////    Route::post('store', AddPermission::class)->name('store');
////    Route::get('{permission}/edit', EditPermission::class)->name('edit');
//
////    Route::put('{permission}/update', UpdatePermission::class)->name('update');
//    Route::delete('{permission}/delete', DeletePermission::class)->name('delete');

});
