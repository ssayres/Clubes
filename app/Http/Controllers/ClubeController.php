<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use Illuminate\Http\Request;

class ClubeController extends Controller
{
    // Exibe a lista de clubes
    public function index()
    {
        $clubes = Clube::all();
        return view('clubes.index', compact('clubes'));
    }

    // Exibe o formulário para criar um novo clube
    public function create()
    {
        return view('clubes.create');
    }

    // Armazena um novo clube no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'periodicidade' => 'required',
        ]);

        // Adiciona o user_id manualmente
        Clube::create([
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'periodicidade' => $request->periodicidade,
            'user_id' => auth()->id(),  // Atribui o ID do usuário autenticado
        ]);

        return redirect()->route('clubes.index')->with('success', 'Clube criado com sucesso.');
    }

    // Exibe os detalhes de um clube específico
    public function show(Clube $clube)
    {
        return view('clubes.show', compact('clube'));
    }

    // Exibe o formulário para editar um clube
    public function edit(Clube $clube)
    {
        return view('clubes.edit', compact('clube'));
    }

    // Atualiza um clube no banco de dados
    public function update(Request $request, Clube $clube)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'periodicidade' => 'required',
        ]);

        $clube->update($request->all());
        return redirect()->route('clubes.index')->with('success', 'Clube atualizado com sucesso.');
    }

    // Exclui um clube
    public function destroy(Clube $clube)
    {
        $clube->delete();
        return redirect()->route('clubes.index')->with('success', 'Clube excluído com sucesso.');
    }
}
