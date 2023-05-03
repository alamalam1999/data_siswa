<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\School\PPDBController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\School\PaymentController;

use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\School\RegistrationController;
use App\Http\Controllers\frontend\school\ReregistrationController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('ppdb', [PPDBController::class, 'index'])->name('ppdb');
Route::post('ppdb', [PPDBController::class, 'store'])->name('ppdb.store');
Route::post('upload', [FileController::class, 'upload'])->name('upload');

// Route::get('ppdb-register', 'PPDBController@register')->name('pendaftaranHomepage');
// Route::post('ppdb-register', 'PPDBController@submit')->name('postPendaftaranHomepage');
// Route::get('ppdb-activation/{id}', 'PPDBController@activation');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::get('document-upload/{id}', [AccountController::class, 'upload_document'])->name('upload');
        Route::post('document-upload', [AccountController::class, 'upload'])->name('upload_document');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('ppdb-login', [PPDBController::class, 'user'])->name('ppdb.user');
        Route::get('ppdb/payment-formulir/{id}', [PPDBController::class, 'paymentFormulir'])->name('ppdb.payment.formulir');
        Route::post('ppdb/payment-formulir', [PPDBController::class, 'postPaymentFormulir'])->name('ppdb.payment.formulir_post');

        // Route::get('ppdb/confirmation', [PPDBTableController::class, 'confirmation'])->name('ppdb.confirmation');
        // Route::post('ppdb/confirmation', [PPDBTableController::class, 'confirmationPost'])->name('ppdb.confirmation.post');

        Route::get('payment-formulir/{id}', [PaymentController::class, 'formulir'])->name('payment.formulir');
        Route::post('payment-formulir', [PaymentController::class, 'formulirPost'])->name('payment.formulir_post');

        Route::get('payment-administration/{id}', [PaymentController::class, 'administration'])->name('payment.administration');
        Route::post('payment-administration', [PaymentController::class, 'administrationPost'])->name('payment.administration_post');

        Route::get('re-registration/{id}', [RegistrationController::class, 'student'])->name('registration');
        Route::post('re-registration', [RegistrationController::class, 'studentPost'])->name('registration_post');

        Route::get('reregistration/{id}', [RegistrationController::class, 'reregistration'])->name('reregistration');
        //Route::get('reregistration', [ReRegistrationController::class, 'index'])->name('registration');
        Route::post('reregistration', [RegistrationController::class, 'store'])->name('registration.store');

        Route::get('acceptreregistration/{id}', [RegistrationController::class, 'acceptreregistration'])->name('acceptreregistration');
        Route::get('recheckreregistration/{id}', [RegistrationController::class, 'recheckreregistration'])->name('recheckreregistration');

        Route::post('reregistrationdetail', [RegistrationController::class, 'storedetail'])->name('registration.storedetail');

    });
});

// These routes require no user to be logged in
Route::group(['middleware' => 'guest'], function () {
});
