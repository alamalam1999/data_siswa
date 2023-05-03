<?php

use App\Http\Controllers\Backend\ppdb\PPDBController;
use App\Http\Controllers\Backend\ppdb\PPDBTableController;

// Faq Management
Route::group(['namespace' => 'ppdb'], function () {
    // Route::get('ppdb', [PPDBController::class, 'index'])->name('ppdb.index');
    // Route::get('ppdb/{id}', [PPDBController::class, 'edit'])->name('ppdb.edit');
    Route::resource('ppdb', 'PPDBController', ['except' => ['show']]);
    Route::post('ppdb/discount', [PPDBController::class, 'updateDiscountCode'])->name('ppdb.discount');

    //For DataTables
    Route::post('ppdb/get',  [PPDBTableController::class, '__invoke'])->name('ppdb.get');
});
