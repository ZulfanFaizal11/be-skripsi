<?php

use App\Http\Controllers\LapanganController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return 'Services running successfully!!🚀🚀🚀';
    });

    // auth
    Route::post('/login', [UserController::class, 'postLogin']);
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('restricted', function () {
            $user = Auth::user();
            return response()->json([
                'msg' => 'Protected route!',
                'user' => $user,
            ]);
        });

        Route::post('/register', [UserController::class, 'postRegister']);
        Route::post('/logout', [UserController::class, 'postLogout']);
    });

    // lapangan
    Route::group(['prefix' => '/lapangan'], function () {
        Route::get('all', [LapanganController::class, 'getAllLapangan']);
    });
});
