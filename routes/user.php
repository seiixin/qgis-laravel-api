<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\ChecklistController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\LanguageController;
use App\Http\Controllers\User\AccessibilityController;
use App\Http\Controllers\User\ContactController;

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/settings',[SettingsController::class,'update']);
    Route::post('/earthquake/checklist/progress',[ChecklistController::class,'saveProgress']);
    Route::get('/earthquake/audio',[MediaController::class,'audio']);
    Route::get('/earthquake/videos',[MediaController::class,'videos']);
    Route::put('/settings/language',[LanguageController::class,'update']);
    Route::put('/settings/accessibility',[AccessibilityController::class,'update']);
    Route::get('/emergency/hotlines',[ContactController::class,'hotlines']);
    Route::post('/emergency/contacts',[ContactController::class,'store']);
    Route::delete('/emergency/contacts/{id}',[ContactController::class,'destroy']);
});
