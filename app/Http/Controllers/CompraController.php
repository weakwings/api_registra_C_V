<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Lista todas as compras
    public function index()
    {
        $compras = Compra::all();
        return response()->json($compras);
    }

    // Cria uma nova compra
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'data' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'fornecedor' => 'required|string|max:255',
        ]);

        // Criação da compra
        $compra = Compra::create($request->all());

        // Retorna a compra criada como resposta
        return response()->json($compra, 201);
    }

    // Mostra os detalhes de uma compra específica
    public function show($id)
    {
        $compra = Compra::find($id);
        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada'], 404);
        }
        return response()->json($compra);
    }

    // Atualiza uma compra existente
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'data' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'fornecedor' => 'required|string|max:255',
        ]);

        // Encontra a compra pelo ID
        $compra = Compra::find($id);
        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada'], 404);
        }

        // Atualiza a compra
        $compra->update($request->all());

        // Retorna a compra atualizada como resposta
        return response()->json($compra);
    }

    // Exclui uma compra
    public function destroy($id)
    {
        // Encontra a compra pelo ID
        $compra = Compra::find($id);
        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada'], 404);
        }

        // Exclui a compra
        $compra->delete();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Compra excluída com sucesso']);
    }
}
