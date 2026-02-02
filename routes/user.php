<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ChecklistController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\LanguageController;
use App\Http\Controllers\User\AccessibilityController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\User\ImpactController;
use App\Http\Controllers\User\MapController;


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/settings',[SettingsController::class,'update']);
    Route::get('/settings',[SettingsController::class,'read']);
    Route::get('/checklist-items', [ChecklistController::class, 'viewChecklist']);
    Route::post('/earthquake/checklist/progress', [ChecklistController::class, 'saveChecklistCompletion']);
    Route::get('/maps', [MapController::class, 'index']);
    Route::get('/maps/{id}', [MapController::class, 'show']);
    Route::get('/maps/{id}/offline', [MapController::class, 'offline']);    
    Route::get('/earthquake/audio',[MediaController::class,'audio']);
    Route::get('/earthquake/videos',[MediaController::class,'videos']);
    Route::get('/earthquake-info', [InfoController::class, 'index']);
    Route::get('/impact-results',[ImpactController::class,'index']);
    Route::put('/settings/language',[LanguageController::class,'update']);
    Route::put('/settings/accessibility',[AccessibilityController::class,'update']);
    Route::get('/emergency/hotlines',[ContactController::class,'hotlines']);
    Route::post('/emergency/contacts',[ContactController::class,'store']);
    Route::delete('/emergency/contacts/{id}',[ContactController::class,'destroy']);

});
