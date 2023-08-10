<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Backend\ppdb\PPDBController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Route::get('/postsss',function() {
//     dd('tes API');
// });

Route::post('/loginhype',[AuthenticationController::class, 'loginhype']);

Route::group(['middleware' => 'auth:api'] , function () {
    Route::get('/posts',[PPDBController::class, 'indextest']);
});

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function () {
        // Route::post('register', 'RegisterController@register');
        Route::post('login', 'AuthController@login');
        // Password Reset
        // Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    });

    Route::group(['middleware' => ['auth:api']], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::get('me', 'AuthController@me');
        });

        // Page
        Route::apiResource('pages', 'PagesController');

        // Faqs
        Route::apiResource('faqs', 'FaqsController');

        // Blog Categories
        Route::apiResource('blog-categories', 'BlogCategoriesController');

        // Blog Tags
        Route::apiResource('blog-tags', 'BlogTagsController');

        // Blogs
        Route::apiResource('blogs', 'BlogsController');
    });
});
