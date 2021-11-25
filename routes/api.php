<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Example\ModelsController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', ['middleware' => 'auth:sanctum', 'uses' => [AuthController::class, 'register']]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('models')->group(function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('', [ModelsController::class, 'index']);
        Route::get('{id}', [ModelsController::class, 'show']);
        Route::post('', [ModelsController::class, 'store']);
        Route::put('{id}', [ModelsController::class, 'update']);
        Route::delete('{id}', [ModelsController::class, 'destroy']);
    });
});
