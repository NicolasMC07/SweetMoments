<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cake;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Mostrar todos los pedidos
    public function index()
    {
        $orders = Order::with('user', 'cake')->get();
        return view('orders.index', compact('orders'));
    }

    // Mostrar el formulario para crear un nuevo pedido
    public function create()
    {
        // Obtener todos los pasteles y usuarios para pasarlos a la vista
        $cakes = Cake::all();
        $users = User::all();

        return view('orders.create', compact('cakes', 'users'));
    }


    // Almacenar un nuevo pedido
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'order_status' => 'required|string',
            'delivery_date' => 'required|date',
            'cake_id' => 'required|exists:cakes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Crear el nuevo pedido
        Order::create([
            'order_status' => $request->order_status,
            'delivery_date' => $request->delivery_date,
            'cake_id' => $request->cake_id,
            'user_id' => $request->user_id,
        ]);

        // Redirigir a la lista de pedidos con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito');
    }

    public function edit($id)
    {
        // Obtener el pedido a editar
        $order = Order::findOrFail($id);

        // Obtener los pasteles y los usuarios
        $cakes = Cake::all();
        $users = User::all();

        return view('orders.edit', compact('order', 'cakes', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'order_status' => 'required|string',
            'delivery_date' => 'required|date',
            'cake_id' => 'required|exists:cakes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Buscar y actualizar el pedido
        $order = Order::findOrFail($id);
        $order->update([
            'order_status' => $request->order_status,
            'delivery_date' => $request->delivery_date,
            'cake_id' => $request->cake_id,
            'user_id' => $request->user_id,
        ]);

        // Redirigir a la lista de pedidos con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado con éxito');
    }


    // Cambiar el estado de un pedido
    public function updateStatus(Request $request, Order $order)
    {
        $order->update([
            'order_status' => $request->status,
        ]);

        return redirect()->route('orders.index');
    }

    // Ver los pedidos de un cliente
    public function userOrders($userId)
    {
        $orders = Order::where('user_id', $userId)->with('cake', 'ingredients')->get();
        return view('orders.user_orders', compact('orders'));
    }

    public function destroy($id)
    {
        // Buscar la orden por ID y eliminarla
        $order = Order::findOrFail($id);
        $order->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Orden eliminada correctamente');
    }

    public function show($id)
    {
        // Buscar la orden por ID
        $order = Order::findOrFail($id);

        // Devolver la vista con los detalles de la orden
        return view('orders.show', compact('order'));
    }
}
