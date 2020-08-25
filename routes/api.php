<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("inventory", "InventoryController");

Route::apiResource("detailline", "DetailLineController");

Route::apiResource("drug", "DrugController");

Route::apiResource("company", "CompanyController");

Route::apiResource("sale", "SaleController");

Route::apiResource("provider", "ProviderController");

Route::apiResource("client", "ClientController");

Route::apiResource("actualUser", "UserController");
