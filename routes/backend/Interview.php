<?php
use App\Http\Controllers\Backend\Interview\InterviewController;
use App\Http\Controllers\Backend\Interview\InterviewTableController;
use App\Http\Controllers\FileController;

// Faq Management
Route::group(['namespace' => 'interview'], function () {
    Route::resource('interview', 'InterviewController', ['except' => ['show']]);
    Route::get('interview', [InterviewController::class, 'index'])->name('interview.index');
    Route::post('interview', [InterviewController::class, 'store'])->name('interview.store');
    Route::get('interview/{id}', [InterviewController::class, 'create'])->name('interview.detail');
    Route::post('interview/upload', [FileController::class, 'upload'])->name('interview.upload');
    Route::post('interview/rnd', [InterviewController::class, 'updateRnd'])->name('interview.rnd');
    Route::post('interview/submit', [InterviewController::class, 'submit'])->name('interview.submit');
    

    //For DataTables
    Route::post('interview/get',  [InterviewTableController::class, '__invoke'])->name('interview.get');
});
