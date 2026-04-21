<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ChecklistController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\User\ImpactController;
use App\Http\Controllers\User\MapController;

Route::middleware('auth:sanctum')->group(function () {

    // Settings — Gap 4 fix: all settings go through SettingsController (AppSetting model)
    Route::get('/settings', [SettingsController::class, 'read']);
    Route::put('/settings', [SettingsController::class, 'update']);
    Route::put('/settings/language', [SettingsController::class, 'updateLanguage']);
    Route::put('/settings/accessibility', [SettingsController::class, 'updateAccessibility']);

    // Checklist
    Route::get('/checklist-items', [ChecklistController::class, 'viewChecklist']);
    Route::get('/checklist-progress', [ChecklistController::class, 'getProgress']);
    Route::put('/checklist-progress', [ChecklistController::class, 'saveProgress']);
    Route::post('/earthquake/checklist/progress', [ChecklistController::class, 'saveChecklistCompletion']);
    // Maps & GeoJSON
    Route::get('/maps', [MapController::class, 'index']);
    Route::get('/maps/{id}', [MapController::class, 'show']);
    Route::get('/maps/{id}/offline', [MapController::class, 'offline']);
    Route::get('/geojson', [MapController::class, 'geojsonList']);
    Route::get('/geojson/{layer}', [MapController::class, 'geojson']);

    // Media
    Route::get('/earthquake/audio', [MediaController::class, 'audio']);
    Route::get('/earthquake/videos', [MediaController::class, 'videos']);

    // Earthquake info — Gap 5 fixed in controller
    Route::get('/earthquake-info', [InfoController::class, 'index']);

    // Impact results
    Route::get('/impact-results', [ImpactController::class, 'index']);

    // Route proxy — forwards to OSRM so the mobile app doesn't need direct access
    Route::get('/route', [MapController::class, 'route']);
    Route::get('/emergency/hotlines', [ContactController::class, 'hotlines']);
    Route::get('/emergency/contacts', [ContactController::class, 'index']);
    Route::post('/emergency/contacts', [ContactController::class, 'store']);
    Route::delete('/emergency/contacts/{id}', [ContactController::class, 'destroy']);
});
