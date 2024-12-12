<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

class ClientCakeController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $clients = User::with('orders')->get();  // Obtener todos los clientes con sus pedidos
        return view('clients.index', compact('clients'));
    }

    // Ver el historial de pedidos de un cliente
    public function showOrders($userId)
    {
        $client = User::findOrFail($userId);
        $orders = $client->orders()->with('cake', 'ingredients')->get();  // Obtener los pedidos de un cliente
        return view('clients.orders', compact('client', 'orders'));
    }

    // Reordenar un pedido
    public function reorder($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Crear un nuevo pedido basándose en el pedido anterior
        $newOrder = Order::create([
            'user_id' => $order->user_id,
            'cake_id' => $order->cake_id,
            'order_status' => 'Pendiente',
            'delivery_date' => $order->delivery_date,  // Puedes personalizar la fecha de entrega si es necesario
        ]);

        // Redirigir al usuario a la lista de pedidos
        return redirect()->route('orders.index')->with('success', 'Pedido reordenado con éxito');
    }
}

