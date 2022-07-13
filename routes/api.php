<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\salesController;

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


Route::prefix('sales')->group(function(){
    Route::get('/', [salesController::class,'index']);
});

Route::prefix('customers')->group(function () {
    Route::post('sales', [salesController::class, 'byCustomer']);
});

