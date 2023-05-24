<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    // Route::get('/v1/user', function (Request $request) {
    //     return $request->user();
    // });
    // Route::post('/v1/logout', [AuthController::class, 'logout']);
    Route::apiResource('/v1/users', UserController::class);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/permissions', PermissionController::class);
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
});

// Route::post('/v1/logout', [AuthController::class, 'logout']);
// Route::post('/v1/signup', [AuthController::class, 'register']);
// Route::post('/v1/login', [AuthController::class, 'login']);

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login1', [AuthController::class, 'login']);
//     Route::post('logout1', 'AuthController@logout');
//     Route::post('refresh1', 'AuthController@refresh');
//     Route::post('me1', 'AuthController@me');

// });
