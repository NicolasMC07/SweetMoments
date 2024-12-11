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
Route::get('orders', [OrderController::class, 'index'])->name('orders.index'); // Ver lista de pedidos
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create'); // Crear nuevo pedido
Route::post('orders', [OrderController::class, 'store'])->name('orders.store'); // Guardar nuevo pedido
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Editar pedido
Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update'); // Actualizar pedido
Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Eliminar pedido
Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');


// Cambiar el estado del pedido (Pendiente, En proceso, Completado, Cancelado)
Route::post('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

// Ver pedidos de un cliente específico
Route::get('clients/{user}/orders', [OrderController::class, 'userOrders'])->name('clients.orders');

// Rutas para manejar clientes (reservas de pasteles, historial, etc.)
Route::resource('clients', ClientCakeController::class);

// Ver el historial de pedidos de un cliente
Route::get('clients/{user}/orders', [ClientCakeController::class, 'showOrders'])->name('clients.showOrders');

// Rutas para la autenticación
require __DIR__.'/auth.php';
