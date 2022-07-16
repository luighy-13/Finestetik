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



Route::prefix('sales')->group(function(){
    Route::get('/', [salesController::class,'index']);
});

Route::prefix('customers')->group(function () {
    Route::post('sales', [salesController::class, 'byCustomer']);
});

