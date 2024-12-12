@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Pedidos de {{ $client->name }}</h1>

    @foreach($orders as $order)
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
        <div class="px-8 py-6">
            <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ $order->cake->name }} - Estado: {{ $order->order_status }}</h3>
            <p class="text-gray-600">Fecha de entrega: {{ \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y') }}</p>

            <form action="{{ route('clients.reorder', $order->id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Reordenar este Pedido
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
