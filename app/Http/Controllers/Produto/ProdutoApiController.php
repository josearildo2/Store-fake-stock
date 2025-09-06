<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoApiController extends Controller
{

    /**
     * Sincroniza produtos da API externa com o banco local
     * 
     * Esta função consulta a API FakeStore, verifica se há produtos locais que não existem 
     * na API e deleta do banco e adiciona os novos produtos ao banco local.
     * 
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception Em caso de falha na conexão com a API
     */
    public function importar()
    {
        try {
            $response = Http::get('https://fakestoreapi.com/products');

            if ($response->failed()) {
                return redirect()->route('produtos.index')
                    ->withErrors(['api' => 'Falha ao conectar na API externa. Status: ' . $response->status()]);
            }

            // Tranforma o array vindo da API em um objeto 'collection' para utilizar o método pluck abaixo
            $produtosApi = collect($response->json());

            // Pega apenas os ids dos produtos da API para verificar no banco se há inexistentes
            $idsApi = $produtosApi->pluck('id')->toArray();

            // Exclui os produtos que possuem external_id e não existe na API
            Produto::whereNotIn('external_id', $idsApi)
                ->whereNotNull('external_id')
                ->delete();

            foreach ($produtosApi as $produto) {
                // Verifica se já existe
                $existente = Produto::where('external_id', $produto['id'])->exists();
                
                if (!$existente) {
                    Produto::create([
                        'external_id' => $produto['id'],
                        'nome' => $produto['title'],
                        'preco' => $produto['price']
                    ]);
                }
            }

            return redirect()->route('produtos.index')
                ->with('success', 'Lista de produtos sincronizada com a API');
        } catch (\Exception $e) {
            return redirect()->route('produtos.index')
                ->withErrors(['api' => 'Erro na sincronização: ' . $e->getMessage()]);
        }
    }
}
