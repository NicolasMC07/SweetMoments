<x-app-layout>
    <div class="container mx-auto py-8">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 shadow">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Pedidos</h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('orders.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nuevo Pedido</a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pastel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha de Entrega</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->cake->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->delivery_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($order->order_status == 'completed')
                                    Completado
                                @elseif ($order->order_status == 'pending')
                                    Pendiente
                                @elseif ($order->order_status == 'processing')
                                    En Proceso
                                @else
                                    No Definido
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('orders.show', $order->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Detalles</a>
                                <a href="{{ route('orders.edit', $order->id) }}"
                                    class="text-indigo-600 hover:text-indigo-800 ml-4">Editar</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                    class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No hay
                                pedidos disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
