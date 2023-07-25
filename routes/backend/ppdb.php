<?php

use App\Http\Controllers\Backend\ppdb\PPDBController;
use App\Http\Controllers\Backend\ppdb\PPDBTableController;
use App\Http\Controllers\Backend\ppdb\PPDBTableAktifController;
use App\Http\Controllers\Backend\ppdb\PPDBTableAlumniController;
use App\Http\Controllers\Backend\ppdb\PPDBTableTidakAktifController;

// Faq Management
Route::group(['namespace' => 'ppdb'], function () {
    // Route::get('ppdb', [PPDBController::class, 'index'])->name('ppdb.index');
    // Route::get('ppdb/{id}', [PPDBController::class, 'edit'])->name('ppdb.edit');
    Route::get('dapodik', [PPDBController::class, 'dapodik'])->name('ppdb.dapodik');
    Route::get('admin/ppdb/{ppdb}/editaktif', [PPDBController::class, 'editaktif'])->name('ppdb.editaktif');
    Route::resource('ppdb', 'PPDBController', ['except' => ['show']]);
    Route::post('ppdb/discount', [PPDBController::class, 'updateDiscountCode'])->name('ppdb.discount'); 

    Route::get('aktif', [PPDBController::class, 'data_siswa'])->name('ppdb.data_siswa');
    Route::get('tidak_aktif', [PPDBController::class, 'siswa_tidak_aktif'])->name('ppdb.siswa_tidak_aktif');
    Route::get('alumni', [PPDBController::class, 'siswa_alumni'])->name('ppdb.siswa_alumni');

    Route::get('ppdb/cekHistory/{id}', [PPDBController::class, 'cekHistory'])->name('ppdb.cekhistory');
    Route::post('ppdb/addclasses', [PPDBController::class, 'addClasses'])->name('ppdb.addclasses');
    Route::post('ppdb/addclass', [PPDBController::class, 'addClass'])->name('ppdb.addclass');

    Route::post('ppdb/showclasses', [PPDBController::class, 'showClasses'])->name('ppdb.showclasses');


    Route::post('ppdb/add_information_school', [PPDBController::class, 'addInformation'])->name('ppdb.information');

    //For DataTables
    Route::post('ppdb/get',  [PPDBTableController::class, '__invoke'])->name('ppdb.get');
    Route::post('ppdb/get_dapodik', [PPDBTableController::class, '__Invoke_dapodik'])->name('ppdb.getdapodik');
    Route::post('ppdb/aktif',  [PPDBTableAktifController::class, '__invoke_aktif'])->name('ppdb.aktif');
    Route::post('ppdb/tidak_aktif', [PPDBTableTidakAktifController::class, '__Invoke_tidak_aktif'])->name('ppdb.tidak_aktif');
    Route::post('ppdb/alumni', [PPDBTableAlumniController::class, '__Invoke_alumni'])->name('ppdb.alumni');
    
    Route::get('ppdb/datakelas', [PPDBTableController::class, '__invoke_datakelas'])->name('ppdb.datakelas');
    Route::get('fetch-students', [PPDBController::class, 'fetchstudents']);
    Route::get('fetch-datakelas', [PPDBController::class, 'fetchdatakelas']);


    Route::post('upload_fhoto', [PPDBController::class, 'upload_fhoto'])->name('upload_fhoto.get');
    
});
