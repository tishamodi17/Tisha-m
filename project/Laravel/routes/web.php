<?php

use Illuminate\Support\Facades\Route;

// load all controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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
    return view('website.index');
});

Route::get('/signup',[UserController::class,'create']);
Route::post('/insert_signup',[UserController::class,'store']);

Route::get('/login',[UserController::class,'login']);
Route::post('/user_auth',[UserController::class,'user_auth']);
Route::get('/user_logout',[UserController::class,'user_logout']);

Route::get('/user_profile',[UserController::class,'user_profile']);
Route::get('/user_profile/{id}',[UserController::class,'edit']);
Route::post('/update_user/{id}',[UserController::class,'update']);


Route::get('/about', function () {
    return view('website.about');
}); 

Route::get('/contact',[ContactController::class,'create']);
Route::post('/insert_contact',[ContactController::class,'store']);

Route::get('/gallery', function () {
    return view('website.gallery');
});

Route::get('/service', function () {
    return view('website.service');
});

Route::get('/categories',[CategoryController::class,'index']);


Route::get('/product_details/{id}',[ProductController::class,'index']);

Route::get('*', function () {
    return view('website.pnf');
});


//  Admin Routes


Route::get('admin-login', function () {
    return view('admin.index');
});

Route::get('dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/add_categories',[CategoryController::class,'create']);
Route::post('/insert_categories',[CategoryController::class,'store']);
Route::get('/manage_categories',[CategoryController::class,'show']);
Route::get('/manage_categories/{id}',[CategoryController::class,'destroy']);

Route::get('/add_orders',[OrderController::class,'create']);
Route::get('/manage_orders',[OrderController::class,'show']);
Route::get('/manage_orders/{id}',[OrderController::class,'destroy']);

Route::get('/add_products',[ProductController::class,'create']);
Route::post('/insert_product',[ProductController::class,'store']);
Route::get('/manage_products',[ProductController::class,'show']);
Route::get('/manage_products/{id}',[ProductController::class,'destroy']);



Route::get('/manage_contacts',[ContactController::class,'show']);
Route::get('/manage_contacts/{id}',[ContactController::class,'destroy']);

Route::get('manage_users',[UserController::class,'show']);
Route::get('/manage_users/{id}',[UserController::class,'destroy']);