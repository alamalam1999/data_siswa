<?php


use App\Http\Controllers\Backend\pricing\PricingController;
use App\Http\Controllers\Backend\Pricing\PricingController as PricingPricingController;
use App\Http\Controllers\Backend\pricing\PricingTableController;


// Faq Management
Route::group(['namespace' => 'pricing'], function () {
    Route::get('pricing', [PricingController::class, 'index'])->name('pricing.index');
    Route::post('pricing', [PricingController::class, 'uploadPricing'])->name('pricing.upload');
    Route::get('checktable', [PricingController::class, 'check_excel'])->name('pricing.check_excel');
    Route::get('export_excel', [PricingController::class, 'export_excel'])->name('pricing.export_excel');


    Route::get('checktable2', [PricingController::class, 'check_excel2'])->name('pricing.check_excel2');

    Route::get('pricingwave2', [PricingController::class, 'indexwave2'])->name('pricing.indexwave2');
});
