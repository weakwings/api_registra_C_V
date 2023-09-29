<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    // Cria um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'required|string|max:500',
            'codigo_barras' => 'required|string|size:12',
        ]);

        $produto = Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'descricao' => $request->input('descricao'),
            'codigo_barras' => $request->input('codigo_barras'),
        ]);

        // Retorna o produto criado como resposta
        return response()->json($produto, 201);
    }

    // Mostra os detalhes de um produto específico
    public function show($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return response()->json($produto);
    }

    // Atualiza um produto existente
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'required|string|max:500',
            'codigo_barras' => 'required|string|size:12',
        ]);

        // Encontra o produto pelo ID
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        // Atualiza o produto
        $produto->update($request->all());

        // Retorna o produto atualizado como resposta
        return response()->json($produto);
    }

    // Exclui um produto
    public function destroy($id)
    {
        // Encontra o produto pelo ID
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        // Exclui o produto
        $produto->delete();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}
