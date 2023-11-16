<?php

use App\Http\Controllers\SinhVienController2;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'sinhvien'], function ($router) {
    Route::get('/show', [SinhVienController2::class, 'show']);
    Route::post('/create', [SinhVienController2::class, 'create']);
    Route::post('/update/{id}', [SinhVienController2::class, 'update']); 
    Route::delete('/delete/{id}', [SinhVienController2::class, 'delete']); 
});
