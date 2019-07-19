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

        Route::get('/all-users', 'adminController@allUsers');
        Route::apiResource('/users', 'AdminController');

        Route::get('/user-roles/{userId}', 'adminController@userRoles');
        // Manage Super Admin Rights
        Route::get('/admin/give-superadmin/{userId}', 'adminController@giveSuperAdmin');
        Route::get('/admin/remove-superadmin/{userId}', 'adminController@removeSuperAdmin');
        // Manage Admin rights
        Route::get('/admin/give-admin/{userId}', 'adminController@giveAdmin');
        Route::get('/admin/remove-admin/{userId}', 'adminController@removeAdmin');
        // Manage Executive rights
        Route::get('/admin/give-executive/{userId}', 'adminController@giveExecutive');
        Route::get('/admin/remove-executive/{userId}', 'adminController@removeExecutive');
        // Manage Manager rights
        Route::get('/admin/give-manager/{userId}', 'adminController@giveManager');
        Route::get('/admin/remove-manager/{userId}', 'adminController@removeManager');
        // Manage Accounting rights
        Route::get('/admin/give-accounting/{userId}', 'adminController@giveAccounting');
        Route::get('/admin/remove-accounting/{userId}', 'adminController@removeAccounting');
        // Manage Head Of Department rights
        Route::get('/admin/give-head-of-department/{userId}', 'adminController@giveHeadOfDepartment');
        Route::get('/admin/remove-head-of-department/{userId}', 'adminController@removeHeadOfDepartment');
        // Manage Treasury Supervisor rights
        Route::get('/admin/give-treasury-supervisor/{userId}', 'adminController@giveTreasurySupervisor');
        Route::get('/admin/remove-treasury-supervisor/{userId}', 'adminController@removeTreasurySupervisor');
        // Manage Treasury Officer rights
        Route::get('/admin/give-treasury-officer/{userId}', 'adminController@giveTreasuryOfficer');
        Route::get('/admin/remove-treasury-officer/{userId}', 'adminController@removeTreasuryOfficer');
        // Manage CashProcessingSupervisor rights
        Route::get('/admin/give-cash-processing-supervisor/{userId}', 'adminController@giveCashProcessingSupervisor');
        Route::get('/admin/remove-cash-processing-supervisor/{userId}', 'adminController@removeCashProcessingSupervisor');
        // Manage CashProcessingOfficer rights
        Route::get('/admin/give-cash-processing-officer/{userId}', 'adminController@giveCashProcessingOfficer');
        Route::get('/admin/remove-cash-processing-officer/{userId}', 'adminController@removeCashProcessingOfficer');
        // Manage Boxroom Supervisor rights
        Route::get('/admin/give-boxroom-supervisor/{userId}', 'adminController@giveBoxroomSupervisor');
        Route::get('/admin/remove-boxroom-supervisor/{userId}', 'adminController@removeBoxroomSupervisor');
        // Manage Boxroom Officer rights
        Route::get('/admin/give-boxroom-officer/{userId}', 'adminController@giveBoxroomOfficer');
        Route::get('/admin/remove-boxroom-officer/{userId}', 'adminController@removeBoxroomOfficer');
        // Manage Vault Supervisor rights
        Route::get('/admin/give-vault-supervisor/{userId}', 'adminController@giveVaultSupervisor');
        Route::get('/admin/remove-vault-supervisor/{userId}', 'adminController@removeVaultSupervisor');
        // Manage Vault Officer rights
        Route::get('/admin/give-vault-officer/{userId}', 'adminController@giveVaultOfficer');
        Route::get('/admin/remove-vault-officer/{userId}', 'adminController@removeVaultOfficer');
        // Manage Cash Movement Supervisor rights
        Route::get('/admin/give-cash-movement-supervisor/{userId}', 'adminController@giveCashMovementSupervisor');
        Route::get('/admin/remove-cash-movement-supervisor/{userId}', 'adminController@removeCashMovementSupervisor');
        // Manage CashMovement Officer rights
        Route::get('/admin/give-cash-movement-officer/{userId}', 'adminController@giveCashMovementOfficer');
        Route::get('/admin/remove-cash-movement-officer/{userId}', 'adminController@removeCashMovementOfficer');
        // Manage Client Supervisor rights
        Route::get('/admin/give-client-supervisor/{userId}', 'adminController@giveClientSupervisor');
        Route::get('/admin/remove-client-supervisor/{userId}', 'adminController@removeClientSupervisor');
        // Manage Client Officer rights
        Route::get('/admin/give-client-officer/{userId}', 'adminController@giveClientOfficer');
        Route::get('/admin/remove-client-officer/{userId}', 'adminController@removeClientOfficer');

        // });

    });

});
