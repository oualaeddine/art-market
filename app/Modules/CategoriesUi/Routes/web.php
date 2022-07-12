<?php

use App\Modules\CategoriesLogic\Controllers\DeleteCategories;
use App\Modules\CategoriesLogic\Controllers\EditParentCategories;
use App\Modules\CategoriesLogic\Controllers\RestoreCategories;
use App\Modules\CategoriesLogic\Controllers\StoreCategories;
use App\Modules\CategoriesLogic\Controllers\StoreNodeCategories;
use App\Modules\CategoriesLogic\Controllers\ToggleCategory;
use App\Modules\CategoriesLogic\Controllers\UpdateCategories;
use App\Modules\CategoriesUi\Controllers\ShowArchivedCategories;
use App\Modules\CategoriesUi\Controllers\ShowCategories;
use App\Modules\CategoriesUi\Controllers\ShowCreateCategories;
use App\Modules\CategoriesUi\Controllers\ShowEditCategories;
use App\Modules\CategoriesUi\Controllers\ShowTreeCategories;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {

    Route::get('', ShowCategories::class)->name('index');
    Route::get('/treeview', ShowTreeCategories::class)->name('treeview');

    Route::get('archived', ShowArchivedCategories::class)->name('archived');

    Route::get('create', ShowCreateCategories::class)->name('create');
    Route::post('store', StoreCategories::class)->name('store');
    Route::post('/store/tree/{category?}', StoreNodeCategories::class)->name('store.node');


    Route::get('{category}/modifier', ShowEditCategories::class)->name('edit');
    Route::put('{category}/update', UpdateCategories::class)->name('update');
    Route::put('{category}/toggle', ToggleCategory::class)->name('toggle');

    Route::delete('{category}/delete', DeleteCategories::class)->name('delete');
    Route::put('{category}/restore', RestoreCategories::class)->name('restore')->withTrashed();

    Route::put('{category}/update/parent', EditParentCategories::class)->name('update.parent')->withTrashed();


});
