<?php

namespace App\Http\Controllers;

use App\Models\User;

class ClientCakeController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $clients = User::with('orders')->get();
        return view('clients.index', compact('clients'));
    }

    // Ver el historial de pedidos de un cliente
    public function showOrders($userId)
    {
        $client = User::findOrFail($userId);
        $orders = $client->orders()->with('cake', 'ingredients')->get();
        return view('clients.orders', compact('client', 'orders'));
    }
}
