<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Detalles del Pedido</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-8 py-6">

                <!-- Estado del Pedido -->
                <div class="mb-4">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Estado del Pedido:</h2>
                    <p class="text-gray-600 text-lg">{{ $order->order_status }}</p>
                </div>

                <!-- Pastel -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Pastel:</h3>
                    <p class="text-gray-600 text-lg">{{ $order->cake->name ?? 'No asignado' }}</p>
                </div>

                <!-- Tamaño del Pastel -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Tamaño del Pastel:</h3>
                    <p class="text-gray-600 text-lg">{{ $order->cake->size ?? 'No asignado' }}</p>
                </div>

                <!-- Fecha de Entrega -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Fecha de Entrega:</h3>
                    <p class="text-gray-600 text-lg">
                        {{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y') : 'No asignada' }}
                    </p>
                </div>

                <!-- Cliente -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Cliente:</h3>
                    <p class="text-gray-600 text-lg">{{ $order->user->name ?? 'No asignado' }}</p>
                </div>

                <!-- Correo del Cliente -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Correo del Cliente:</h3>
                    <p class="text-gray-600 text-lg">{{ $order->user->email ?? 'No asignado' }}</p>
                </div>

                <!-- Número de Teléfono -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Número de Teléfono:</h3>
                    <p class="text-gray-600 text-lg">{{ $order->user->phone_number ?? 'No asignado' }}</p>
                </div>

                <!-- Ingredientes Adicionales -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Ingredientes Adicionales:</h3>
                    <ul class="list-disc pl-5">
                        @forelse($order->ingredients as $ingredient)
                            <li class="text-gray-600 text-lg">{{ $ingredient->name }}</li>
                        @empty
                            <li class="text-gray-600 text-lg">No hay ingredientes adicionales.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Fecha de Creación del Pedido -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Fecha de Creación del Pedido:</h3>
                    <p class="text-gray-600 text-lg">
                        {{ $order->created_at ? \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') : 'Fecha no disponible' }}
                    </p>
                </div>

                <!-- Última Actualización -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Última Actualización:</h3>
                    <p class="text-gray-600 text-lg">
                        {{ $order->updated_at ? $order->updated_at->diffForHumans() : 'No ha sido actualizado' }}
                    </p>
                </div>

                <!-- Botones de Acción -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('orders.index') }}"
                        class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 mr-2">Volver a la lista de Pedidos</a>
                    <a href="{{ route('orders.edit', $order->id) }}"
                        class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">Editar Pedido</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
