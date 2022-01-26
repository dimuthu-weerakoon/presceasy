<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  
    Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/orders', 'ProductsController@index')->name('orders');
Route::get('/prescriptions', 'PrescController@index')->name('presc');
Route::get('/prescriptions/list', 'PrescController@presclist')->name('presclist');



Route::post('/store', [ProductsController::class, 'store']);

Route::get('/cart', [ProductsController::class, 'index'] );

Route::get('/remove/{id}',[ProductsController::class, 'destroy']);

Route::post('/upload',[PrescController::class, 'upload'] );



Route::middleware(['admin'])->group(function () {
    //ADMIN Routes
Route::get('/admin/dashboard','AdminController@home')->name('admin_home');
Route::get('/admin/user_management','AdminController@UserManage')->name('admin_user');
Route::get('/admin/prescription','AdminController@presc')->name('admin_presc');
Route::get('/admin/orders','AdminController@orders')->name('admin_orders');

});





Route::get('/about', function () {
    return view('about');
})->name('about');


});

