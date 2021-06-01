<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyIllustrationController;
use App\Http\Controllers\IllustrationGalleryController;

// use App\Http\Controllers\AuthController;

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
Route::group(['prefix' => 'auth'], function ($router) { 
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/userprofile', [AuthController::class, 'userProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/update-profile',  [AuthController::class, 'updateProfile']);
});

Route::group(['prefix' => 'illustration'], function ($router) { 
    Route::post('/',  [MyIllustrationController::class, 'saveIllus']);
    Route::get('/my-illustration', [MyIllustrationController::class, 'getIllus']);
    Route::get('/', [IllustrationGalleryController::class, 'getIllustrationGallery']);
});

//basic route
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


