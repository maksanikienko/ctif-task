<?php

use App\Http\Controllers\Api\EcoCodeController;
use App\Http\Controllers\Api\IbanController;
use App\Http\Controllers\Api\LocalCodeController;
use App\Http\Controllers\Auth\AuthController;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/userProfile', [AuthController::class, 'userProfile'])->name('userProfile');
});

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
