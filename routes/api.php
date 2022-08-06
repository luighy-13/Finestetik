<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\salesController;
use App\Http\Controllers\AuthController;
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


Route::get('/pass',function(){
    return bcrypt("SuAdmin#");
  });

  Route::post('auth/login', [AuthController::class,'login']);

  Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', [AuthController::class,'user']);
    Route::post('auth/logout', [AuthController::class,'logout']);
    Route::post('auth/register', [AuthController::class,'register']);
    Route::get('auth/users', [AuthController::class,'getUsers']);
    Route::post('auth/delete-user', [AuthController::class,'deleteUser']);
    Route::get('auth/customers', [AuthController::class,'getCustomers']);
  });


  Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', [AuthController::class,'refresh']);
  });

  Route::group(['prefix' => 'users'], function(){
    Route::post('main', 'mainController@mainUser');
    Route::group(['prefix' => 'rol'], function(){
        Route::get('show', 'rolController@show');
        Route::get('show-with-permissions', 'rolController@showWhitPermission');
        Route::post('add-edit', 'rolController@add_or_edit');
        Route::post('delete', 'rolController@deleted');
        Route::post('change-status-permission', 'rolController@saveStatusPermission');
        Route::post('show_rol', 'rolController@showRol');
    });
});


Route::prefix('sales')->group(function(){
    Route::get('/', [salesController::class,'index']);
    Route::post('/add',[salesController::class, 'newSale']);
});

Route::prefix('customers')->group(function () {
    Route::post('sales', [salesController::class, 'byCustomer']);
});

Route::prefix('doctors')->group(function () {

});




// Route::get('/pass',function(){
//   return bcrypt("Administrador2021");
// });

// Route::post('auth/login', 'AuthController@login');

// Route::group(['middleware' => 'jwt.auth'], function(){
//   Route::get('auth/user', 'AuthController@user');
//   Route::post('auth/logout', 'AuthController@logout');
//   Route::post('auth/register', 'AuthController@register');
//   Route::get('auth/users', 'AuthController@getUsers');
//   Route::post('auth/delete-user', 'AuthController@deleteUser');
//   Route::get('auth/customers', 'AuthController@getCustomers');
// });


// Route::group(['middleware' => 'jwt.refresh'], function(){
//   Route::get('auth/refresh', 'AuthController@refresh');
// });


// Route::group(['prefix' => 'users'], function(){
//     Route::post('main', 'mainController@mainUser');
//     Route::group(['prefix' => 'rol'], function(){
//         Route::get('show', 'rolController@show');
//         Route::get('show-with-permissions', 'rolController@showWhitPermission');
//         Route::post('add-edit', 'rolController@add_or_edit');
//         Route::post('delete', 'rolController@deleted');
//         Route::post('change-status-permission', 'rolController@saveStatusPermission');
//         Route::post('show_rol', 'rolController@showRol');
//     });
// });

// Route::prefix('plans')->group(function () {
//     Route::get('show', 'plansController@allPlans');
//     Route::post('add-edit', 'plansController@addPlan');
//     Route::post('delete', 'plansController@deletePlan');
//     Route::get('level-school', 'plansController@getSchools');
//     Route::get('school', 'plansController@getLevelSchool');
// });

// Route::prefix('device')->group(function () {
//   Route::get('show', 'deviceController@allDevices');
//   Route::post('add-edit', 'deviceController@addDevice');
//   Route::post('delete', 'deviceController@deleteDevice');
// });

// Route::prefix('notifications')->group(function () {

// });
// Route::prefix('customers')->group(function () {
//     Route::post('register', 'AuthController@register');
//     Route::post('facture-data', 'AuthController@factureData');
//     Route::get('customer_type', 'customersController@show_customer_type');
//     Route::post('save_customer_type', 'customersController@save_customer_type');
//     Route::post('delete_customer_type', 'customersController@delete_customer_type');

//     Route::prefix('students')->group(function () {
//       Route::post('add-dv-students', 'customersController@add_dv_students');
//       Route::post('show-students', 'customersController@show_students');
//       Route::post("show-students-by-customer", 'customersController@show_students_by_customer');
//       Route::post('save-students', 'customersController@add_or_edit_student');
//       Route::post('delete-students', 'customersController@delete_student');
//       Route::post('saveInfoAcount', 'customersController@saveInfoAccounts');
//     });
// });

// Route::prefix('sales')->group(function () {
//     Route::post('add', 'salesController@add');
//     Route::post('add-not-pay', 'salesController@addOrderwhitoutPay');
//     Route::get('show', 'salesController@show');
//     Route::post('showByCustomer', 'salesController@showByCustomer');
//     Route::post('add-dv', 'salesController@addDv');
//     Route::post('add-paid', 'salesController@addPaid');
//     Route::post('active-account', 'salesController@active_account');
//     Route::post('add-paid-manual', 'salesController@addPaidManual');
//     Route::get('refresh-paids', 'salesController@refreshPaid');
//     Route::post('cancel-sales', 'salesController@cancelSales');
//     Route::post('pay-invoice', 'salesController@payInvoice');
// });

// Route::prefix('invoice')->group(function(){
//   Route::post('auth', 'invoiceController@auth');
// });


// Route::prefix('openpay')->group(function(){
//   Route::get('user','OpenpayController@createUser');
//   Route::get('getUser','OpenpayController@getUser');
//   Route::post('addCard','OpenpayController@addCard');
//   Route::get('getCards', 'OpenpayController@getCards');
//   Route::post('getCardsId', 'OpenpayController@getCardsId');
//   Route::post('deleteCard','OpenpayController@deleteCard');
//   Route::get('addCharger', 'OpenpayController@addCharger');
//   Route::get('create_plan', 'OpenpayController@createPlan');
//   Route::post('addChargerManual', 'OpenpayController@addChargerManual');
// });


// Route::prefix('reports')->group(function(){
//   Route::post('sales','reportsController@salesReport');
//   Route::post('sales-by-mounth','reportsController@getPaidsMonth');
// });
