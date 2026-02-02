<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\ImpactController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\HotlineController;

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::post('/maps', [MapController::class, 'store']);
    Route::put('/maps/{id}', [MapController::class, 'update']);
    Route::post('/offline-maps', [MapController::class, 'storeOffline']);

    Route::post('/impact-results', [ImpactController::class, 'store']);
    Route::post('/earthquake-info', [InfoController::class, 'store']);
    Route::post('/checklist-items', [ChecklistController::class, 'store']);
    Route::post('/emergency-hotlines', [HotlineController::class, 'store']);
});
