<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\UsingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'task'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/login', [AuthController::class, 'index']);
        Route::post('/login', [AuthController::class, 'login']);

        Route::get('/registration', [AuthController::class, 'registration']);
        Route::post('/registration', [AuthController::class, 'store']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/', [ThingController::class, 'index']);
    Route::get('/home', [ThingController::class, 'index']);

    Route::group(['prefix' =>  '/things', 'middleware' => 'auth:sanctum'], function() {
        Route::post('/', [ThingController::class, 'store']);

        Route::get('/my', [ThingController::class, 'my']);
        Route::get('/repairing', [ThingController::class, 'repairing']);
        Route::get('/transfered', [ThingController::class, 'transfered']);
        Route::get('/create', [ThingController::class, 'create']);

        Route::get('/{id}/edit', [ThingController::class, 'edit']);
        Route::get('/{id}/delete', [ThingController::class, 'destroy']);
        Route::get('/{id}/use', [ThingController::class, 'take']);
        Route::get('/{id}/move', [ThingController::class, 'edit_move']);
        Route::post('/{id}/move', [ThingController::class, 'move']);
        Route::get('/{id}/free', [ThingController::class, 'abort']);
        Route::put('/{id}', [ThingController::class, 'update']);
    });

    Route::group(['prefix' => '/things'], function() {
        Route::get('/', [ThingController::class, 'index']);
        Route::get('/free', [ThingController::class, 'free']);

        Route::get('/{id}', [ThingController::class, 'show']);
    });

    Route::group(['prefix' => '/places', 'middleware' => 'auth:sanctum'], function() {
        Route::post('/', [PlaceController::class, 'store']);
        Route::get('/my', [PlaceController::class, 'my']);
        Route::get('/create', [PlaceController::class, 'create']);

        Route::put('/{id}', [PlaceController::class, 'update']);
        Route::get('/{id}/delete', [PlaceController::class, 'destroy']);
        Route::get('/{id}/edit', [PlaceController::class, 'edit']);
        Route::get('/{id}/things', [PlaceController::class, 'things']);
        Route::post('/{id}/things', [PlaceController::class, 'add']);
    });

    Route::group(['prefix' => '/places'], function() {
        Route::get('/', [PlaceController::class, 'index']);
        Route::get('/{id}', [PlaceController::class, 'show']);
    });

    Route::group(['prefix' => '/archive'], function() {
        Route::get('/', [ArchiveController::class, 'index']);
        Route::get('/{id}', [ArchiveController::class, 'show']);
        Route::get('/{id}/recover', [ArchiveController::class, 'recover'])->middleware('auth:sanctum');
    });

    Route::group(['prefix' => '/users'], function() {
        Route::get('/{id}', [ThingController::class, 'user']);
    });
});
