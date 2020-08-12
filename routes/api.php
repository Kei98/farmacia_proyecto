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

//Hay que hacerlo después de la autenticación

Route::apiResource("drugs", "DrugController");

Route::apiResource("inventories", "InventoryController");

Route::apiResource("detail_lines", "DetailLineController");

Route::apiResource("companies", "CompanyController");

Route::apiResource("sales", "SaleController");

Route::apiResource("providers", "ProviderController");
