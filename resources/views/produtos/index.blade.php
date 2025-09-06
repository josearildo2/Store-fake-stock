<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto mt-4 rounded-md">
                <table class="w-full text-sm text-left dark:bg-dark rounded-md">
                    <thead class="text-xs uppercase">
                        <tr class="border">
                            <th scope="col" class="px-6 py-3 w-auto">Nome</th>
                            <th scope="col" class="px-6 py-3 w-auto">Preço</th>
                            <th scope="col" class="px-6 py-3 w-auto">Estoque</th>
                            <th scope="col" class="px-6 py-3 w-20">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-2 font-medium">teste</td>
                            <td class="px-6 py-2 font-medium">teste</td>
                            <td class="px-6 py-2 font-medium">teste</td>
                            <td class="px-6 py-2 space-x-1">
                                <div class="flex items-center gap-2">
                                    <button class="cursor-pointer text-xs font-medium text-black">Editar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
