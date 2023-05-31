<?php

use App\Http\Controllers\Backend\ppdb\PPDBController;
use App\Http\Controllers\Backend\ppdb\PPDBTableController;

// Faq Management
Route::group(['namespace' => 'ppdb'], function () {
    // Route::get('ppdb', [PPDBController::class, 'index'])->name('ppdb.index');
    // Route::get('ppdb/{id}', [PPDBController::class, 'edit'])->name('ppdb.edit');
    Route::resource('ppdb', 'PPDBController', ['except' => ['show']]);
    Route::post('ppdb/discount', [PPDBController::class, 'updateDiscountCode'])->name('ppdb.discount'); 

    Route::get('ppdb/cekHistory/{id}', [PPDBController::class, 'cekHistory'])->name('ppdb.cekhistory');
    Route::post('ppdb/addclasses', [PPDBController::class, 'addClasses'])->name('ppdb.addclasses');

    Route::post('ppdb/showclasses', [PPDBController::class, 'showClasses'])->name('ppdb.showclasses');


    Route::post('ppdb/add_information_school', [PPDBController::class, 'addInformation'])->name('ppdb.information');

    //For DataTables
    Route::post('ppdb/get',  [PPDBTableController::class, '__invoke'])->name('ppdb.get');
    Route::get('ppdb/datakelas', [PPDBTableController::class, '__invoke_datakelas'])->name('ppdb.datakelas');
    Route::get('fetch-students', [PPDBController::class, 'fetchstudents']);
    Route::get('fetch-datakelas', [PPDBController::class, 'fetchdatakelas']);


    Route::post('upload_fhoto', [PPDBController::class, 'upload_fhoto'])->name('upload_fhoto.get');
    
});
