<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\SuperDispatchController;

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

Route::get('/', [PagesController::class, 'home'])->name('front_page');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact');
Route::get('/how-it-works', [PagesController::class, 'how_it_works'])->name('how');
Route::get('/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/terms-and-conditions', [PagesController::class, 'terms'])->name('terms');
Route::post('/place-order', [LeadController::class, 'place_order'])->name('place_order');
Route::get('/thank-you', [PagesController::class, 'thank_you'])->name('thank-you');
Route::get('/get-makes', [AutoCompleteController::class, 'getMakesByYear'])->name('getMakesByYear');
Route::get('/get-models', [AutoCompleteController::class, 'getModelsByMake'])->name('getModelsByMake');
Route::get('/get-address', [AutoCompleteController::class, 'getAddress'])->name('getAddress');

Route::prefix('customer')->group(function() {
    Route::get('login', [PagesController::class, 'customer_login_page'])->name('customer_login_page');
    Route::post('login', [CustomerController::class, 'login'])->name('customer_login');
    Route::get('logout', [CustomerController::class, 'logout'])->name('customer_logout');
    Route::middleware('customer')->group(function() {
        Route::get('account', [PagesController::class, 'account'])->name('customer_account');
        Route::get('account/orders', [PagesController::class, 'orders'])->name('customer_orders');
        Route::get('account/details', [PagesController::class, 'account_details'])->name('account_details');
        Route::post('account/details', [CustomerController::class, 'updateCustomer'])->name('updateCustomer');
    });
});

Route::prefix('place-order')->group(function() {
    Route::get('/', [PagesController::class, 'place_order_page'])->name('place_order_page');
    Route::get('/car', [PagesController::class, 'place_order_car'])->name('place_order_car');
    Route::get('/motorcycle', [PagesController::class, 'place_order_motorcycle'])->name('place_order_motorcycle');
    Route::get('/rv', [PagesController::class, 'place_order_rv'])->name('place_order_rv');
    Route::get('/boat', [PagesController::class, 'place_order_boat'])->name('place_order_boat');
    Route::get('/atv-utv', [PagesController::class, 'place_order_atv'])->name('place_order_atv');
    Route::get('/heavy-equipment', [PagesController::class, 'place_order_heavy'])->name('place_order_heavy');
});


Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/get-address', [AutoCompleteController::class, 'getAddress'])->name('getAddress_admin');
    Route::get('/customer-data/{id}', [DashboardController::class, 'getCustomerData'])->name('getCustomerData');

    //SuperDispatch
    Route::get('api', [SuperDispatchController::class, 'api'])->name('api');
    Route::post('api/price-check', [SuperDispatchController::class, 'check_price'])->name('superdispatch.price-check');

    // Users
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('leads/getData', [LeadController::class, 'getLeads'])->name('datatable.leads');
    Route::resource('leads', LeadController::class);
    Route::get('quotes/getData', [QuoteController::class, 'getQuotes'])->name('datatable.quotes');
    Route::resource('quotes', QuoteController::class);
    Route::get('orders/getData', [OrderController::class, 'getOrders'])->name('datatable.orders');
    Route::resource('orders', OrderController::class);
    Route::get('vehicles/getData', [VehicleController::class, 'getvehicles'])->name('datatable.vehicles');
    Route::resource('vehicles', VehicleController::class);

    Route::post('leads/convert-to-quote', [LeadController::class, 'convert_to_quote'])->name('convert_to_quote');
    Route::get('quotes/{id}/convert-to-quote', [QuoteController::class, 'convert_to_order'])->name('convert_to_order');
});
