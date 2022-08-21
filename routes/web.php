<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ViewController;
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
    return view('main');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
    Route::get('customers', 'customer')->name('customers');
});

Route::prefix('/')->middleware('auth')->group(function () {
    Route::resource('customers', ViewController::class);
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('admin', CustomerController::class);
});
