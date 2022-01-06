<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PatientController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\QMSController;
use App\Http\Controllers\AppointmentDrugController;
use App\Http\Controllers\AppointmentDiseaseController;
use App\Http\Controllers\PatientHeirController;

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');
Route::get('qms/screen', [QMSController::class, 'screen'])->name('qms.screen');
Route::group([
    'middleware' => ['auth']
], function (){

    Route::resource('patient', PatientController::class);
    Route::group([
        'as' => 'patient.',
        'prefix' => 'patients/'
    ], function (){
        Route::post('updateHealth/{id}', [PatientController::class, 'updateHealth'])->name('updateHealth');
    });

    Route::resource('heir', PatientHeirController::class);
    Route::get('heirs/delete/{id}/', [PatientHeirController::class, 'delete'])->name('heir.delete');


    Route::resource('disease', DiseaseController::class);
    Route::resource('drug', DrugController::class);

    Route::resource('appointment', AppointmentController::class);
    Route::group([
        'as' => 'appointment.',
        'prefix' => 'appointments/'
    ], function (){
        Route::get('check/{id}', [AppointmentController::class, 'check'])->name('check');
        Route::get('checkCompleted/{id}', [AppointmentController::class, 'checkCompleted'])->name('checkCompleted');

        Route::get('pharmacy/{id}', [AppointmentController::class, 'pharmacy'])->name('pharmacy');
        Route::post('pharmacy/{id}', [AppointmentController::class, 'pharmacyCompleted'])->name('pharmacyCompleted');

        Route::get('receipt/{id}', [AppointmentController::class, 'receipt'])->name('receipt');
    });


    Route::group([
        'as' => 'qms.',
        'prefix' => 'qms/'
    ], function (){
        Route::get('set-room', [QMSController::class, 'setRoom'])->name('setRoom');
        Route::post('set-room', [QMSController::class, 'saveRoom'])->name('saveRoom');

        Route::get('doctor-call', [QMSController::class, 'doctorCall'])->name('doctor-call');
        Route::get('pharmacy-call', [QMSController::class, 'pharmacyCall'])->name('pharmacy-call');
        Route::get('recall', [QMSController::class, 'recall'])->name('recall');


    });

    Route::group([
        'as' => 'appointment-drug.',
        'prefix' => 'appointment-drug/'
    ], function (){
        Route::get('create/{appointment_id}', [AppointmentDrugController::class, 'create'])->name('create');
        Route::post('create/{appointment_id}', [AppointmentDrugController::class, 'store'])->name('store');
        Route::get('delete/{id}', [AppointmentDrugController::class, 'destroy'])->name('delete');
    });

    Route::group([
        'as' => 'appointment-disease.',
        'prefix' => 'appointment-disease/'
    ], function (){
        Route::get('create/{appointment_id}', [AppointmentDiseaseController::class, 'create'])->name('create');
        Route::post('create/{appointment_id}', [AppointmentDiseaseController::class, 'store'])->name('store');
        Route::get('delete/{id}', [AppointmentDiseaseController::class, 'destroy'])->name('delete');

    });

    Route::resource('patient', PatientController::class);

});

Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});
