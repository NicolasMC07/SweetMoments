<?php

use App\Http\Controllers\ClientCakeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de Pedidos
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

// Cambiar estado del pedido
Route::post('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

// Rutas para clientes
Route::get('clients', [ClientCakeController::class, 'index'])->name('clients.index');
Route::get('clients/{userId}/orders', [ClientCakeController::class, 'showOrders'])->name('clients.orders');
Route::post('clients/orders/{orderId}/reorder', [ClientCakeController::class, 'reorder'])->name('clients.reorder');

require __DIR__.'/auth.php';
