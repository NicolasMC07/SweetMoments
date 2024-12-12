<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Clientes</h1>
    
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-8 py-6">
                <ul>
                    @foreach($clients as $client)
                        <li class="mb-4">
                            <a href="{{ route('clients.orders', $client->id) }}" class="text-blue-500">
                                {{ $client->name }} - Ver pedidos
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>


