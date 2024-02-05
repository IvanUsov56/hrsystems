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

Route::get('/', [\App\Http\Controllers\DeliveryController::class, 'index']);

Route::resource('delivery', \App\Http\Controllers\DeliveryController::class)->names('delivery');
Route::post('delivery/delete', [\App\Http\Controllers\DeliveryController::class,'destroySelected'])->name('delivery.destroy.selected');
