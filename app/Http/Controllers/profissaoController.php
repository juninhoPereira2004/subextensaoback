<?php

namespace App\Http\Controllers;

use App\Models\Profissao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfissaoController extends Controller
{
    // Listar todas as profissões
    public function index()
    {
        $profissoes = Profissao::all();
        return response()->json($profissoes);
    }

    // Criar uma nova profissão
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'salario' => 'required|numeric|min:0',
            'empresa' => 'required|string|max:255',
        ]);

        // Criando a nova profissão
        $profissao = Profissao::create($validated);

        return response()->json($profissao, 201);
    }

    // Exibir os detalhes de uma profissão
    public function show($id)
    {
        $profissao = Profissao::findOrFail($id);
        return response()->json($profissao);
    }

    // Atualizar os dados de uma profissão
    public function update(Request $request, $id)
    {
        $profissao = Profissao::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'salario' => 'required|numeric|min:0',
            'empresa' => 'required|string|max:255',
        ]);

        $profissao->update($validated);

        return response()->json($profissao);
    }

    // Excluir uma profissão
    public function destroy($id)
    {
        $profissao = Profissao::findOrFail($id);
        $profissao->delete();

        return response()->json(['message' => 'Profissão excluída com sucesso']);
    }
}
