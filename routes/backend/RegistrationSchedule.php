<?php

use App\Http\Controllers\Backend\RegistrationSchedules\RegistrationSchedulesController;

// Faq Management
Route::group(['namespace' => 'RegistrationSchedules'], function () {
    Route::resource('registration-schedules', 'RegistrationSchedulesController', ['except' => ['show']]);
    Route::post('delete', [RegistrationSchedulesController::class, 'delete'])->name('registration-schedules.delete');
    Route::post('update', [RegistrationSchedulesController::class, 'update'])->name('registration-schedules.update');

    //For DataTables
    Route::post('registration-schedules/get', 'RegistrationSchedulesTableController')->name('registration-schedules.get');
});
