<?php


use App\Http\Controllers\Backend\payment\PaymentController;
use App\Http\Controllers\Backend\payment\PaymentTableController;


// Faq Management
Route::group(['namespace' => 'payment'], function () {
    Route::resource('payment', 'PaymentController', ['except' => ['show']]);
    Route::get('payment/detail/{id}', [PaymentController::class, 'getPaymentDetail'])->name('payment.detail');
    Route::post('payment/store', [PaymentController::class, 'postApprovePayment'])->name('payment.action');
    

    //For DataTables
    Route::post('payment/get',   [PaymentTableController::class, '__invoke'])->name('payment.get');
});
