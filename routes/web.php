<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', function () {
    return view('auth.login', [
                'login'=>true
    ]);
})->name('login');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::post('/login', [AdminController::class, 'login'])->name('login-post');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// User CRUD

Route::get('/user/form/{action}', [AdminController::class, 'showUserForm'])->name('user-form');
Route::get('/users', [AdminController::class, 'listUser'])->name('list-user');
Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
Route::post('/user/create', [AdminController::class, 'storeUser'])->name('store-user');
Route::post('/user/update/{id}', [AdminController::class, 'updateUser'])->name('update-user');

// Store CRUD

Route::get('/store/form/{action}', [AdminController::class, 'showStoreForm'])->name('store-form');
Route::get('/stores', [AdminController::class, 'listStore'])->name('list-store');
Route::get('/store/detail/{id}', [AdminController::class, 'detailStore'])->name('detail-store');
Route::get('/store/delete/{id}', [AdminController::class, 'deleteStore'])->name('delete-store');
Route::post('/store/create', [AdminController::class, 'storeStore'])->name('store-store');
Route::post('/store/update/{id}', [AdminController::class, 'updateStore'])->name('update-store');

// Category CRUD

Route::get('/categories', [AdminController::class, 'listCategories'])->name('list-categories');
Route::get('/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('delete-category');
Route::post('/category/create', [AdminController::class, 'storeCategory'])->name('store-category');
Route::post('/category/update/{id}', [AdminController::class, 'updateCategory'])->name('update-category');
Route::post('/category/add-product', [AdminController::class, 'addProductCategory'])->name('add-product-category');
Route::get('/category/remove-product/{product}&{category}', [AdminController::class, 'removeProductCategory'])->name('remove-product-category');

// Product CRUD

Route::get('/product/form/{action}', [AdminController::class, 'showProductForm'])->name('product-form');
Route::get('/products', [AdminController::class, 'listProduct'])->name('list-product');
Route::get('/produc/delete/{id}', [AdminController::class, 'deleteProduct'])->name('delete-product');
Route::post('/product/create', [AdminController::class, 'storeProduct'])->name('store-product');
Route::post('/product/update/{id}', [AdminController::class, 'updateProduct'])->name('update-product');





// Route::get('/createadmin', function () {

//     $user = new User;

//     $user->name = 'Administrador';
//     $user->email = 'admin@gmail.com';
//     $user->password = Hash::make('12345');
//     $user->role = 'ADMIN';
//     $user->status = 'ACTIVE';

//     $user->save();

// });
