<?php

use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UnitController;
use App\Models\Product_Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\SignupController;
use App\Http\Controllers\backend\ResetPasswordController;
use App\Http\Controllers\backend\OrdersController;
use App\Http\Controllers\backend\PaymentTypeController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\backend\WarehouseController;

// use Illuminate\Routing\Route as RoutingRoute;

/* Pages routes */

Route::get('/',[HomeController::class,'index']);
Route::get('/login',[LoginController::class,'index']);
Route::get('/signup',[SignupController::class,'index']);
Route::get('/reset-password',[ResetPasswordController::class,'index']);
Route::get('/orders',[OrdersController::class,'index']);


//User CRUD Routes
Route::resource('users', UsersController::class);
Route::get('/only_trashed', [UsersController::class, 'get_trash'])->name('only_trashed');
Route::post('users/restore/{id}', [UsersController::class, 'restore'])->name('users.restore');
Route::delete('users/forceDelete/{id}', [UsersController::class, 'forceDelete'])->name('users.forceDelete');


//PRODUCTS
Route::get('products/trash',[ProductController::class,'trash'])->name('products.trash');
Route::post('products/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
Route::delete('products/forceDelete/{id}',[ProductController::class,'forceDelete'])->name('products.forceDelete');

Route::resource('products',ProductController::class);


//PRODUCT CATEGORY
Route::get('/categories/trash',[ProductCategoryController::class,'trash'])->name('categories.trash');

Route::post('/categories/restore/{id}',[ProductCategoryController::class,'restore'])->name('categories.restore');

Route::delete('/categories/forceDelete/{id}',[ProductCategoryController::class,'forceDelete'])->name('categories.forceDelete');

Route::resource('categories', ProductCategoryController::class);


//SUB CATEGORY
Route::get('subcategories/trash',[SubCategoryController::class,'trash'])->name('subcategories.trash');

Route::post('subcategories/restore/{id}',[SubCategoryController::class,'restore'])->name('subcategories.restore');

Route::delete('subcategories/forceDelete/{id}',[SubCategoryController::class,'forceDelete'])->name('subcategories.forceDelete');

Route::resource('subcategories',SubCategoryController::class);


//PAYMENT
Route::get('payment/trash',[PaymentTypeController::class,'trash'])->name('payment.trash');
Route::post('payment/restore/{id}',[PaymentTypeController::class,'restore'])->name('payment.restore');
Route::delete('payment/forceDelete/{id}',[PaymentTypeController::class,'forceDelete'])->name('payment.forceDelete');

Route::resource('payment',PaymentTypeController::class);

//UNIT
Route::get('units/trash',[UnitController::class,'trash'])->name('units.trash');
Route::post('units/restore/{id}',[UnitController::class,'restore'])->name('units.restore');
Route::delete('units/forceDelete/{id}',[UnitController::class,'forceDelete'])->name('units.forceDelete');

Route::resource('units',UnitController::class);

//COMPANIES
Route::get('companies/trash',[CompanyController::class,'trash'])->name('companies.trash');
Route::post('companies/restore/{id}',[CompanyController::class,'restore'])->name('companies.restore');
Route::delete('companies/forceDelete/{id}',[CompanyController::class,'forceDelete'])->name('companies.forceDelete');

Route::resource('companies',CompanyController::class);

//WAREHOUSES
Route::get('warehouses/trash',[WarehouseController::class,'trash'])->name('warehouses.trash');
Route::post('warehouses/restore/{id}',[WarehouseController::class,'restore'])->name('warehouses.restore');
Route::delete('warehouses/forceDelete/{id}',[WarehouseController::class,'forceDelete'])->name('warehouses.forceDelete');

Route::resource('warehouses',WarehouseController::class);

//CUSTOMERS
Route::get('customers/trash',[CustomerController::class,'trash'])->name('customers.trash');
Route::post('customers/restore/{id}',[CustomerController::class,'restore'])->name('customers.restore');
Route::delete('customers/forceDelete/{id}',[CustomerController::class,'forceDelete'])->name('customers.forceDelete');

Route::resource('customers',CustomerController::class);

//SUPPLIER
Route::get('suppliers/trash',[SupplierController::class,'trash'])->name('suppliers.trash');
Route::post('suppliers/restore/{id}',[SupplierController::class,'restore'])->name('suppliers.restore');
Route::delete('suppliers/forceDelete/{id}',[SupplierController::class,'forceDelete'])->name('suppliers.forceDelete');

Route::resource('suppliers',SupplierController::class);

