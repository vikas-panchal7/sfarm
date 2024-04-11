<?php

use App\Http\Controllers\Agent_commisons_controller;
use App\Http\Controllers\Agent_product_controller;
use App\Http\Controllers\Agent_product_prices_controller;
use App\Http\Controllers\AgentCommisonsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Customer_product_prices_controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseBillController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SaleBillController;
use App\Http\Controllers\SalesController;
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
Route::get('/shop', [Customer_product_prices_controller::class, 'getAllProducts']);

Route::get('/about', function () {
    return view('user/about');
});
Route::get('/password', function () {
    return view('user/changepassword');
});
Route::get('/contact', function () {
    return view('user/contact');
});
Route::get('/dashboard', function () {
    return view('admin/index');
});
Route::get('/dashboard',[CartController::class,'adminindex']);
Route::get('/showprofile',[RegisterController::class, 'userview']);
Route::get('/bills',[PurchaseBillController::class, 'farmer']);
Route::get('/billdetails', [PurchaseBillController::class,'farmerdetails']);
Route::get('/changePassword', function () {
    return view('admin/changepassword');
});


Route::post("/addcart",[CartController::class,'store']);
Route::post("/update_cart_quantity",[CartController::class,'updateCartQuantity']);
Route::get("/gettotalproducts",[CartController::class,'count']);
Route::get('/cart', [CartController::class,'index']);
Route::post('/cart/{id}', [CartController::class, 'destroy']);

Route::get('/checkout',[CartController::class, 'getTotalCartValue']);
Route::post('/placeorder',[OrderController::class, 'placeOrder']);

Route::get('/orders',[OrderController::class, 'details']);
Route::get('/orderdetails',[OrderController::class, 'orderdetails']);


Route::get('/agent/dashboard', function () {
    return view('agent/index');
});
Route::get('/agent/changePassword', function () {
    return view('agent/changepassword');
});

Route::get('/agent/product', [ProductController::class, 'getSubProducts']);
Route::post('/agent/addproduct', [Agent_product_controller::class, 'store']);
Route::post('/agent/product/delete/{id}', [Agent_product_controller::class, 'destroy']);
Route::get('/agent/commission', [Agent_commisons_controller::class,'get']);
Route::post('agent/commission/update', [Agent_commisons_controller::class,'storeOrUpdate']);

Route::get('agent/profile',[RegisterController::class, 'view']);

Route::get('/logout',[RegisterController::class, 'logout']);

Route::get('agent/purchasebill', [PurchaseBillController::class,'index']);
Route::get('agent/salebill', [SaleBillController::class,'index']);
Route::get('agent/purchasedetails', [PurchaseBillController::class,'details']);
Route::get('agent/saledetails', [SaleBillController::class,'details']);
Route::get('agent/purchase', [PurchaseController::class,'index']);
Route::get('agent/sale', [SalesController::class,'index']);
Route::post('agent/purchase', [PurchaseController::class,'store']);
Route::post('agent/sale', [SalesController::class,'store']);
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/registration', [RegisterController::class, 'register']);
Route::post('/addfarmer', [RegisterController::class, 'addFarmer']);
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

Route::get('/contacts',[ContactController::class,'index']);
Route::post('contact',[ContactController::class,'contact']);

Route::get('/orderList',[OrderController::class, 'orderList']);
Route::post('/update-order-status',[OrderController::class, 'updateOrderStatus']);
Route::get('/profile/{id}',[RegisterController::class, 'edit']);
Route::post('/profile/update',[RegisterController::class, 'update']);
Route::get('registration',[RegisterController::class,'registration']);
Route::post('userregistration',[RegisterController::class,'userregistration']);