<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Super Admin
Route::group(['prefix' => 'superadmin', 'middleware' => 'superadmin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\superadmin\SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/profile', [App\Http\Controllers\superadmin\SuperadminController::class, 'profile'])->name('superadmin.profile');
    Route::post('/profile', [App\Http\Controllers\superadmin\SuperadminController::class, 'profileData'])->name('superadmin.profiledata');

    // User Management
    Route::get('/user', [App\Http\Controllers\superadmin\UserController::class, 'index'])->name('superadmin.user');
    Route::get('/user/add', [App\Http\Controllers\superadmin\UserController::class, 'create'])->name('superadmin.user.add');
    Route::post('/user/store', [App\Http\Controllers\superadmin\UserController::class, 'store'])->name('superadmin.user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\superadmin\UserController::class, 'edit'])->name('superadmin.user.edit');
    Route::post('/user/update', [App\Http\Controllers\superadmin\UserController::class, 'update'])->name('superadmin.user.update');
    Route::post('/user/delete', [App\Http\Controllers\superadmin\UserController::class, 'delete'])->name('superadmin.user.delete');

    // Category
    Route::get('/category', [App\Http\Controllers\superadmin\CategoryController::class, 'index'])->name('superadmin.category');
    Route::get('/category/add', [App\Http\Controllers\superadmin\CategoryController::class, 'create'])->name('superadmin.category.add');
    Route::post('/category/store', [App\Http\Controllers\superadmin\CategoryController::class, 'store'])->name('superadmin.category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\superadmin\CategoryController::class, 'edit'])->name('superadmin.category.edit');
    Route::post('/category/update', [App\Http\Controllers\superadmin\CategoryController::class, 'update'])->name('superadmin.category.update');
    Route::post('/category/delete', [App\Http\Controllers\superadmin\CategoryController::class, 'delete'])->name('superadmin.category.delete');

    // Supplier
    Route::get('/supplier', [App\Http\Controllers\superadmin\SupplierController::class, 'index'])->name('superadmin.supplier');
    Route::get('/supplier/add', [App\Http\Controllers\superadmin\SupplierController::class, 'create'])->name('superadmin.supplier.add');
    Route::post('/supplier/store', [App\Http\Controllers\superadmin\SupplierController::class, 'store'])->name('superadmin.supplier.store');
    Route::get('/supplier/edit/{id}', [App\Http\Controllers\superadmin\SupplierController::class, 'edit'])->name('superadmin.supplier.edit');
    Route::post('/supplier/update', [App\Http\Controllers\superadmin\SupplierController::class, 'update'])->name('superadmin.supplier.update');
    Route::post('/supplier/delete', [App\Http\Controllers\superadmin\SupplierController::class, 'delete'])->name('superadmin.supplier.delete');

    // Expense
    Route::get('/expense', [App\Http\Controllers\superadmin\ExpenseController::class, 'index'])->name('superadmin.expense');
    Route::get('/expense/add', [App\Http\Controllers\superadmin\ExpenseController::class, 'create'])->name('superadmin.expense.add');
    Route::post('/expense/store', [App\Http\Controllers\superadmin\ExpenseController::class, 'store'])->name('superadmin.expense.store');
    Route::get('/expense/edit/{id}', [App\Http\Controllers\superadmin\ExpenseController::class, 'edit'])->name('superadmin.expense.edit');
    Route::post('/expense/update', [App\Http\Controllers\superadmin\ExpenseController::class, 'update'])->name('superadmin.expense.update');
    Route::post('/expense/delete', [App\Http\Controllers\superadmin\ExpenseController::class, 'delete'])->name('superadmin.expense.delete');

    // Supplier Payment
    Route::get('/supplier-payment', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'index'])->name('superadmin.supplier-payment');
    Route::get('/supplier-payment/add', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'create'])->name('superadmin.supplier-payment.add');
    Route::post('/supplier-payment/store', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'store'])->name('superadmin.supplier-payment.store');
    Route::get('/supplier-payment/edit/{id}', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'edit'])->name('superadmin.supplier-payment.edit');
    Route::post('/supplier-payment/update', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'update'])->name('superadmin.supplier-payment.update');
    Route::post('/supplier-payment/delete', [App\Http\Controllers\superadmin\SupplierPaymentsController::class, 'delete'])->name('superadmin.supplier-payment.delete');

    // Product
    Route::get('/product', [App\Http\Controllers\superadmin\ProductController::class, 'index'])->name('superadmin.product');
    Route::get('/product/add', [App\Http\Controllers\superadmin\ProductController::class, 'create'])->name('superadmin.product.add');
    Route::post('/product/store', [App\Http\Controllers\superadmin\ProductController::class, 'store'])->name('superadmin.product.store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\superadmin\ProductController::class, 'edit'])->name('superadmin.product.edit');
    Route::post('/product/update', [App\Http\Controllers\superadmin\ProductController::class, 'update'])->name('superadmin.product.update');
    Route::post('/product/delete', [App\Http\Controllers\superadmin\ProductController::class, 'delete'])->name('superadmin.product.delete');
    Route::get('/product/add-multiple', [App\Http\Controllers\superadmin\ProductController::class, 'addMultiple'])->name('superadmin.product.addMultiple');
    Route::post('/product/store-multiple', [App\Http\Controllers\superadmin\ProductController::class, 'storeMultiple'])->name('superadmin.product.storeMultiple');

    Route::get('/settings', [App\Http\Controllers\superadmin\SettingController::class, 'index'])->name('superadmin.settings');
    Route::post('/settings/storeInformation', [App\Http\Controllers\superadmin\SettingController::class, 'storeInformation'])->name('superadmin.storeInformation');
    Route::post('/settings/posInformation', [App\Http\Controllers\superadmin\SettingController::class, 'posInformation'])->name('superadmin.posInformation');
    Route::post('/settings/currencyInformation', [App\Http\Controllers\superadmin\SettingController::class, 'currencyInformation'])->name('superadmin.currencyInformation');
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [App\Http\Controllers\admin\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [App\Http\Controllers\admin\AdminController::class, 'profileData'])->name('admin.profiledata');

    // User Management
    Route::get('/user', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.user');
    Route::get('/user/add', [App\Http\Controllers\admin\UserController::class, 'create'])->name('admin.user.add');
    Route::post('/user/store', [App\Http\Controllers\admin\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update', [App\Http\Controllers\admin\UserController::class, 'update'])->name('admin.user.update');
    Route::post('/user/delete', [App\Http\Controllers\admin\UserController::class, 'delete'])->name('admin.user.delete');

    // Category
    Route::get('/category', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/add', [App\Http\Controllers\admin\CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/category/store', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/category/delete', [App\Http\Controllers\admin\CategoryController::class, 'delete'])->name('admin.category.delete');

    // Supplier
    Route::get('/supplier', [App\Http\Controllers\admin\SupplierController::class, 'index'])->name('admin.supplier');
    Route::get('/supplier/add', [App\Http\Controllers\admin\SupplierController::class, 'create'])->name('admin.supplier.add');
    Route::post('/supplier/store', [App\Http\Controllers\admin\SupplierController::class, 'store'])->name('admin.supplier.store');
    Route::get('/supplier/edit/{id}', [App\Http\Controllers\admin\SupplierController::class, 'edit'])->name('admin.supplier.edit');
    Route::post('/supplier/update', [App\Http\Controllers\admin\SupplierController::class, 'update'])->name('admin.supplier.update');
    Route::post('/supplier/delete', [App\Http\Controllers\admin\SupplierController::class, 'delete'])->name('admin.supplier.delete');

    // Expense
    Route::get('/expense', [App\Http\Controllers\admin\ExpenseController::class, 'index'])->name('admin.expense');
    Route::get('/expense/add', [App\Http\Controllers\admin\ExpenseController::class, 'create'])->name('admin.expense.add');
    Route::post('/expense/store', [App\Http\Controllers\admin\ExpenseController::class, 'store'])->name('admin.expense.store');
    Route::get('/expense/edit/{id}', [App\Http\Controllers\admin\ExpenseController::class, 'edit'])->name('admin.expense.edit');
    Route::post('/expense/update', [App\Http\Controllers\admin\ExpenseController::class, 'update'])->name('admin.expense.update');
    Route::post('/expense/delete', [App\Http\Controllers\admin\ExpenseController::class, 'delete'])->name('admin.expense.delete');

    // Supplier Payment
    Route::get('/supplier-payment', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'index'])->name('admin.supplier-payment');
    Route::get('/supplier-payment/add', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'create'])->name('admin.supplier-payment.add');
    Route::post('/supplier-payment/store', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'store'])->name('admin.supplier-payment.store');
    Route::get('/supplier-payment/edit/{id}', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'edit'])->name('admin.supplier-payment.edit');
    Route::post('/supplier-payment/update', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'update'])->name('admin.supplier-payment.update');
    Route::post('/supplier-payment/delete', [App\Http\Controllers\admin\SupplierPaymentsController::class, 'delete'])->name('admin.supplier-payment.delete');

    // Product
    Route::get('/product', [App\Http\Controllers\admin\ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/add', [App\Http\Controllers\admin\ProductController::class, 'create'])->name('admin.product.add');
    Route::post('/product/store', [App\Http\Controllers\admin\ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\admin\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update', [App\Http\Controllers\admin\ProductController::class, 'update'])->name('admin.product.update');
    Route::post('/product/delete', [App\Http\Controllers\admin\ProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('/product/add-multiple', [App\Http\Controllers\admin\ProductController::class, 'addMultiple'])->name('admin.product.addMultiple');
    Route::post('/product/store-multiple', [App\Http\Controllers\admin\ProductController::class, 'storeMultiple'])->name('admin.product.storeMultiple');

    Route::get('/settings', [App\Http\Controllers\admin\SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings/storeInformation', [App\Http\Controllers\admin\SettingController::class, 'storeInformation'])->name('admin.storeInformation');
    Route::post('/settings/posInformation', [App\Http\Controllers\admin\SettingController::class, 'posInformation'])->name('admin.posInformation');
    Route::post('/settings/currencyInformation', [App\Http\Controllers\admin\SettingController::class, 'currencyInformation'])->name('admin.currencyInformation');
});