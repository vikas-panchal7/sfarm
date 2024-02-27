<?php

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
    return view('admin/index');
});
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