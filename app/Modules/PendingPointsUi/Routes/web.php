<?php


use App\Modules\PendingPointsLogic\Controllers\AcceptPendingPoints;
use App\Modules\PendingPointsLogic\Controllers\RefusePendingPoints;
use App\Modules\PendingPointsLogic\Controllers\StorePendingPoints;
use App\Modules\PendingPointsUi\Controllers\ShowPendingPoints;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'points', 'as' => 'points.'], function () {
    Route::get('/', ShowPendingPoints::class)->name('index');
    Route::post('/store', StorePendingPoints::class)->name('store');
    Route::put('{point}/refuse', RefusePendingPoints::class)->name('refuse');
    Route::put('{point}/confirm', AcceptPendingPoints::class)->name('confirm');
});
