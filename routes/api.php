<?php

use App\Http\Controllers\TinyUrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Widi\Shortener\Infrastructure\TinyUrlGeneratorController;

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


Route::middleware('check.bearer')->post('/short-url', TinyUrlGenerator::class);
Route::middleware('check.bearer')->post('/short-url-2', TinyUrlGeneratorController::class);
