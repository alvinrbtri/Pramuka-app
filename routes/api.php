<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;


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

Route::get('ok', function ()
{
    return response()->json("OK");
});
Route::get('auth/index', [AuthController::class, 'index']);
Route::post('/auth/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get("/coba", function () {
    echo "i";
});
