<?php


use App\Http\Controllers\Backend\pricing\PricingController;
use App\Http\Controllers\Backend\Pricing\PricingController as PricingPricingController;
use App\Http\Controllers\Backend\pricing\PricingTableController;


// Faq Management
Route::group(['namespace' => 'import'], function () {
    Route::get('import', [PricingController::class, 'index'])->name('import.index');

    Route::get('master' , [PricingController::class, 'master'])->name('master.class');
    Route::get('master/update/{id}', [PricingController::class, 'masterUpdate'])->name('masterupdate.class');
    Route::post('masterupdated', [PricingController::class, 'masterdone'])->name('masterdone.class');
    Route::post('masterinsert', [PricingController::class, 'masterinsert'])->name('masterinsert.class');

    Route::get('masterstore' , [PricingController::class, 'masterstore'])->name('masterstore.class');

    Route::post('masterdeleted', [PricingController::class, 'masterDelete'])->name('masterdelete.class');

    Route::post('datasiswa', [PricingController::class, 'uploadDatasiswa'])->name('import.upload');
    Route::post('dapodik',   [PricingController::class, 'uploadDapodik'])->name('import.dapodik');
    Route::get('checktable', [PricingController::class, 'check_excel'])->name('import.check_excel');
    Route::get('export_excel', [PricingController::class, 'export_excel'])->name('import.export_excel');


    Route::get('checktable2', [PricingController::class, 'check_excel2'])->name('import.check_excel2');
    Route::get('check_payment', [PricingController::class, 'check_payment'])->name('import.check_payment');

    Route::get('check_interview', [PricingController::class, 'check_interview'])->name('import.check_interview');

    Route::get('pricingwave2', [PricingController::class, 'indexwave2'])->name('import.indexwave2');
});
