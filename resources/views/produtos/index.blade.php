<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Produtos
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('produtos.create') }}">
            <x-primary-button class="mt-3">Criar Produto</x-primary-button>
        </a>
        <a href="{{ route('produtos.importar') }}">
            <x-secondary-button class="mt-3 ml-2">Fake Store API</x-secondary-button>
        </a>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="text-green-600 mt-2">
                {{ session('success') }}
            </div>
        @endif

        @error('api')
            <x-input-error class="mt-2" :messages="$message" />
        @enderror
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto mt-4 rounded-md">
                <table class="w-full text-sm text-left rounded-md">
                    <thead class="text-xs uppercase">
                        <tr class="border">
                            <th scope="col" class="px-2 py-3 w-auto">Nome</th>
                            <th scope="col" class="px-6 py-3 w-auto">Preço</th>
                            <th scope="col" class="px-6 py-3 w-auto">Estoque</th>
                            <th scope="col" class="px-1 py-3 w-50 flex justify-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td class="px-2 py-2 font-medium">{{ $produto->nome }}</td>
                                <td class="px-6 py-2 font-medium">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="px-11 py-2 font-medium">{{ $produto->estoque }}</td>
                                <td class="px-1 py-2 flex justify-center">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('produtos.edit', $produto->id) }}">
                                            <button class="cursor-pointer px-2.5 py-2 text-xs font-medium text-white bg-blue-700 rounded-md hover:bg-blue-800 
                                                focus:ring-1 focus:outline-none focus:ring-blue-300">
                                                Editar
                                            </button>
                                        </a>
                                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Tem certeza que deseja deletar este produto?')" 
                                                class="cursor-pointer px-2.5 py-2 text-xs font-medium text-white bg-red-700 rounded-md hover:bg-red-800 
                                                focus:ring-1 focus:outline-none focus:ring-red-300">
                                                Deletar
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mx-auto sm:px-2 lg:px-3">
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>