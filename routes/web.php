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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/invoices/{status?}', [App\Http\Controllers\InvoiceController::class,'index'])->name('invoice.index');

Route::get('/bills/index',[App\Http\Controllers\BillsController::class,'index'])->name('bills.index');
Route::view('/bills/create','bills.create')->name('bills.create');
Route::post('/bills/store', [App\Http\Controllers\BillsController::class, 'store'])->name('bills.store');
Route::get('/bills/{bill:id}/edit', [App\Http\Controllers\BillsController::class, 'edit'])->name('bills.edit');
Route::put('/bills/{id}', [App\Http\Controllers\BillsController::class, 'update'])->name('bills.update');
Route::delete('/bills/{id}', [App\Http\Controllers\BillsController::class, 'delete'])->name('bills.delete');


