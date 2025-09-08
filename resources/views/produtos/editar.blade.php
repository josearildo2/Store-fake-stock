<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Produto
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-5 w-500 border shadow rounded-md p-4 flex space-x-3">
                    <div class="w-1/3">
                        <x-input-label for="nome" value='Nome do Produto'/>
                        <x-text-input type="text" id="nome" name="nome"
                            class="mt-1 block w-full" value="{{ old('nome', $produto->nome) }}"/>
                    </div>
                    <div class="w-1/3">
                        <x-input-label for="preco" value='Preço'/>
                        <x-text-input type="number" id="preco" name="preco" min="0" step="0.01"
                            class="mt-1 block w-full" value="{{ old('preco', $produto->preco) }}"/>
                        @error('preco')
                            <x-input-error class="mt-2" :messages="$message" />
                        @enderror
                    </div>
                    <div class="w-1/3">
                        <x-input-label for="estoque" value='Estoque'/>
                        <x-text-input type="number" id="estoque" name="estoque" 
                            class="mt-1 block w-full" value="{{ old('estoque', $produto->estoque) }}" />
                        @error('estoque')
                            <x-input-error class="mt-2" :messages="$message" />
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
                <x-primary-button type="submit">Salvar</x-primary-button>
                <a href="{{ route('produtos.index') }}">
                    <x-secondary-button class="mt-3">Voltar</x-secondary-button>
                </a>
            </div>
        </form>
    </div>

</x-app-layout>