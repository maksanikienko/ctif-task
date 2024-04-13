<?php

use App\Http\Controllers\Api\EcoCodeController;
use App\Http\Controllers\Api\IbanController;
use App\Http\Controllers\Api\LocalCodeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/eco-codes', [EcoCodeController::class, 'index'])->name('api.eco-codes');
Route::get('/local-codes', [LocalCodeController::class, 'index'])->name('api.local-codes');

Route::get('/get-parent-location', [LocalCodeController::class, 'index']);
Route::get('/get-child-location', [LocalCodeController::class, 'getChildLocation']);
Route::post('/index-iban', [IbanController::class, 'index'])->name('iban.index');



Route::get('/app', function () {
    return view('index');
});
