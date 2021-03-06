<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('customers', [\App\Http\Controllers\CustomerController::class, 'index'])
    ->name('customers.index');
Route::get('customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])
    ->name('customers.show');
Route::get('customers/{customer}/update', [\App\Http\Controllers\CustomerController::class, 'update'])
    ->name('customers.update');
Route::get('customers/{customer}/trash', [\App\Http\Controllers\CustomerController::class, 'destroy'])
    ->name('customers.trash');

Route::get('pay', [\App\Http\Controllers\PayOrderController::class, 'store'])
    ->name('pay.store');
