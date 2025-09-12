<?php

use App\Models\Product_Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\SignupController;
use App\Http\Controllers\backend\ResetPasswordController;
use App\Http\Controllers\backend\OrdersController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\UsersController;
// use Illuminate\Routing\Route as RoutingRoute;

/* Pages routes */

Route::get('/',[HomeController::class,'index']);
Route::get('/login',[LoginController::class,'index']);
Route::get('/signup',[SignupController::class,'index']);
Route::get('/reset-password',[ResetPasswordController::class,'index']);
Route::get('/orders',[OrdersController::class,'index']);


//User CRUD Routes
Route::resource('users', UsersController::class);

//User Soft Deletes
// Trash page
Route::get('/only_trashed', [UsersController::class, 'get_trash'])->name('only_trashed');

// Restore a user
Route::post('users/restore/{id}', [UsersController::class, 'restore'])->name('users.restore');

// Permanently delete a user
Route::delete('users/forceDelete/{id}', [UsersController::class, 'forceDelete'])->name('users.forceDelete');


//PRODUCT CATEGORY
Route::resource('categories', ProductCategoryController::class);
