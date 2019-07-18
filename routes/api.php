<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');

    Route::group([
        'namespace' => 'Api',
        'middleware' => 'api',
        'prefix' => 'password',
    ], function () {
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });

    // Authenticated Routes
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getUser', 'Api\AuthController@getUser');

        Route::apiResource('/roles', 'RoleController');

        // Route::group(['middleware' => 'admin'], function () {

        // Route::get('/admin', 'Api\adminController@index');
        // Route::get('/admin/give-admin/{userId}', 'Api\adminController@giveAdmin');
        // Route::get('/admin/remove-admin/{userId}', 'Api\adminController@removeAdmin');

        // });

    });

});
