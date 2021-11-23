<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PatientController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DrugController;

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

Route::group([
    'middleware' => ['auth']
], function (){

    Route::resource('patient', PatientController::class);
    Route::resource('disease', DiseaseController::class);
    Route::resource('drug', DrugController::class);
});

Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});
