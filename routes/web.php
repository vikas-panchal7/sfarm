<?php

use App\Http\Controllers\Agent_product_controller;
use App\Http\Controllers\Agent_product_prices_controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Customer_product_prices_controller;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubproductController;
use Illuminate\Support\Facades\Route;

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
    return view('user/home');
});

Route::get('/login', function () {
    return view('user/login');
});

Route::get('/home', function () {
    return view('user/home');
});
Route::get('/about', function () {
    return view('user/about');
});
Route::get('/contact', function () {
    return view('user/contact');
});
Route::get('/dashboard', function () {
    return view('admin/index');
});

Route::get('/changePassword', function () {
    return view('admin/changepassword');
});

Route::get('/agent/dashboard', function () {
    return view('agent/index');
});
Route::get('/agent/changePassword', function () {
    return view('agent/changepassword');
});

Route::get('/agent/product', [ProductController::class, 'getSubProducts']);
Route::post('/agent/addproduct', [Agent_product_controller::class, 'store']);
Route::post('/agent/product/delete/{id}', [Agent_product_controller::class, 'destroy']);

Route::post('/login', [RegisterController::class, 'login']);
Route::post('/registration', [RegisterController::class, 'register']);
Route::get('/register', function () {
    return view('admin/register');
});
Route::get('/customers', [RegisterController::class, 'getCustomers']);
Route::get('/agents', [RegisterController::class, 'getAgents']);
Route::get('/farmers', [RegisterController::class, 'getFarmers']);
Route::get('/assistants', [RegisterController::class, 'getAssistants']);
Route::get('/products', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'create']);
Route::post('/product/update/{id}', [ProductController::class, 'update']);
Route::post('/product/delete/{id}', [ProductController::class, 'delete']);

Route::get('/subproducts', [SubproductController::class, 'index']);
Route::post('/subproducts', [SubproductController::class, 'store']);
Route::post('/subproducts/update/{id}', [SubproductController::class, 'update']);
Route::post('/subproducts/delete/{id}', [SubproductController::class, 'destroy']);


Route::get('/pincode', [PincodeController::class, 'index']);
Route::post('/pincode', [PincodeController::class, 'store']);
Route::post('/pincode/update/{id}', [PincodeController::class, 'update']);
Route::post('/pincode/delete/{id}', [PincodeController::class, 'destroy']);

Route::post('/change', [RegisterController::class, 'changePassword']);

// Route::get('/apprice',  function () {
//     return view('admin/agent_price');
// });
Route::get('/apprice', [Agent_product_prices_controller::class, 'getAllProductsWithPrices']);
Route::post('/appriceupdate', [Agent_product_prices_controller::class, 'updateOrInsertPrice']);


Route::get('/cpprice', [Customer_product_prices_controller::class, 'getAllProductsWithPrices']);
Route::post('/cppriceupdate', [Customer_product_prices_controller::class, 'updateOrInsertPrice']);

Route::get('/contact',[ContactController::class,'index']);

Route::get('/profile/{id}',[RegisterController::class, 'edit']);
Route::post('/profile/update',[RegisterController::class, 'update']);