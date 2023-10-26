<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
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

Route::post('/login', [StoreController::class, 'login'])->name('login-store');

Route::get('/stores', [StoreController::class, 'index'])->name('list-store');
Route::post('/store/create', [StoreController::class, 'store'])->name('store-store');
Route::put('/store/update/{id}', [StoreController::class, 'update'])->name('update-store');
Route::get('/store/detail/{id}', [StoreController::class, 'show'])->name('detail-store');
Route::get('/store/delete/{id}', [StoreController::class, 'delete'])->name('delete-store');
Route::get('/store/count', [StoreController::class, 'create'])->name('count-store');
