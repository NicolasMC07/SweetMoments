<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-pink-600 mb-6">Crear Nuevo Pedido</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form action="{{ route('orders.store') }}" method="POST" class="px-8 py-8">
                @csrf

                <!-- Estado del pedido (Pendiente, En Proceso, Completado, Cancelado) -->
                <div class="mb-4">
                    <label for="order_status" class="block text-gray-700 font-bold mb-2">Estado del Pedido:</label>
                    <select name="order_status" id="order_status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500"
                        required>
                        <option value="pending" {{ old('order_status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                        <option value="processing" {{ old('order_status') == 'processing' ? 'selected' : '' }}>En Proceso</option>
                        <option value="completed" {{ old('order_status') == 'completed' ? 'selected' : '' }}>Completado</option>
                        <option value="canceled" {{ old('order_status') == 'canceled' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                    @error('order_status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de entrega -->
                <div class="mb-4">
                    <label for="delivery_date" class="block text-gray-700 font-bold mb-2">Fecha de Entrega:</label>
                    <input type="date" name="delivery_date" id="delivery_date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500"
                        value="{{ old('delivery_date') }}" required>
                    @error('delivery_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Seleccionar pastel -->
                <div class="mb-4">
                    <label for="cake_id" class="block text-gray-700 font-bold mb-2">Seleccionar Pastel:</label>
                    <select name="cake_id" id="cake_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500" required>
                        @foreach($cakes as $cake)
                            <option value="{{ $cake->id }}" {{ old('cake_id') == $cake->id ? 'selected' : '' }}>
                                {{ $cake->name }} ({{ $cake->size }})
                            </option>
                        @endforeach
                    </select>
                    @error('cake_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Seleccionar usuario -->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">ID del Cliente:</label>
                    <select name="user_id" id="user_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end">
                    <a href="{{ route('orders.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</a>
                    <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">Crear Pedido</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
