<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login-authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Area
Route::group(['middleware' =>['isAdmin'], 'prefix' => 'admin'], function(){
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');

    //Users data
    Route::get('/admin-data-user', [UserController::class, 'index'])->name('data-user');
    Route::get('/admin-add-data-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/admin-save-data-user', [UserController::class, 'store'])->name('save-user');
    Route::get('/admin-edit-data-user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/admin-update-data-user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/admin-delete-data-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
});

//Manager Area
Route::group(['middleware' =>['isManager'], 'prefix' => 'manager'], function(){
    Route::get('/dashboard-manager', [ManagerController::class, 'index'])->name('dashboard-manager');

    //Users data
    Route::get('/manager-data-user', [UserController::class, 'index'])->name('manager-data-user');
    Route::get('/manager-add-data-user', [UserController::class, 'create'])->name('manager-add-user');
    Route::post('/manager-save-data-user', [UserController::class, 'store'])->name('manager-save-user');
    Route::get('/manager-edit-data-user/{id}', [UserController::class, 'edit'])->name('manager-edit-user');
    Route::post('/manager-update-data-user/{id}', [UserController::class, 'update'])->name('manager-update-user');
    Route::delete('/manager-delete-data-user/{id}', [UserController::class, 'destroy'])->name('manager-delete-user');

    //Categories Data
    Route::get('manager-data-category', [CategoryController::class, 'index'])->name('manager-data-categories');
    Route::get('manager-add-data-category', [CategoryController::class, 'create'])->name('manager-add-category');
    Route::post('manager-save-data-category', [CategoryController::class, 'store'])->name('manager-save-category');
    Route::get('manager-edit-data-category/{id}', [CategoryController::class, 'edit'])->name('manager-edit-category');
    Route::post('manager-update-data-category/{id}', [CategoryController::class, 'update'])->name('manager-update-category');
    Route::delete('manager-delete-data-category/{id}', [CategoryController::class, 'destroy'])->name('manager-delete-category');

    //Products Data
    Route::get('manager-data-product', [ProductController::class, 'index'])->name('manager-data-product');
    Route::get('manager-add-product', [ProductController::class, 'create'])->name('manager-add-product');
    Route::post('manager-save-product', [ProductController::class, 'store'])->name('manager-save-product');
    Route::get('manager-edit-product/{id}', [ProductController::class, 'edit'])->name('manager-edit-product');
    Route::post('manager-update-product/{id}', [ProductController::class, 'update'])->name('manager-update-product');
    Route::delete('manager-delete-product/{id}', [ProductController::class, 'destroy'])->name('manager-delete-product');
});

//Employee Area
Route::group(['middleware' => ['isEmployee'], 'prefix' => 'employee'], function(){
    Route::get('/dashboard-employee', [EmployeeController::class, 'index'])->name('dashboard-employee');
    Route::post('/add-order', [OrderController::class, 'create'])->name('add-order');
    Route::get('/make-order/{id}', [OrderController::class, 'make'])->name('make-order');
    Route::get('/make-order/{id}/{category_id}', [OrderController::class, 'select'])->name('select-product');
    Route::post('add-to-cart/{id}/{category_id}', [OrderController::class, 'add'])->name('add-to-cart');
    Route::get('/cart/{id}', [OrderController::class, 'cart'])->name('cart');
    Route::post('/edit-item-cart/{order_id}/{id}', [OrderController::class, 'edit'])->name('edit-cart');
    Route::delete('/delete-item-cart/{order_id}/{id}', [OrderController::class, 'destroy'])->name('delete-cart');
    Route::post('/checkout/{id}', [OrderController::class, 'checkout'])->name('checkout');
});