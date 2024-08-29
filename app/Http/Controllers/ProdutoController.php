<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Clube;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibe a lista de produtos de um clube específico
    public function index(Clube $clube)
    {
        $produtos = $clube->produtos;
        return view('produtos.index', compact('produtos', 'clube'));
    }

    // Exibe o formulário para criar um novo produto
    public function create(Clube $clube)
    {
        return view('produtos.create', compact('clube'));
    }

    // Armazena um novo produto no banco de dados
    public function store(Request $request, Clube $clube)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
        ]);

        $clube->produtos()->create($request->all());
        return redirect()->route('clubes.produtos.index', $clube->id)->with('success', 'Produto criado com sucesso.');
    }

    // Exibe os detalhes de um produto específico
    public function show(Clube $clube, Produto $produto)
    {
        return view('produtos.show', compact('produto', 'clube'));
    }

    // Exibe o formulário para editar um produto
    public function edit(Clube $clube, Produto $produto)
    {
        return view('produtos.edit', compact('produto', 'clube'));
    }

    // Atualiza um produto no banco de dados
    public function update(Request $request, Clube $clube, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
        ]);

        $produto->update($request->all());
        return redirect()->route('clubes.produtos.index', $clube->id)->with('success', 'Produto atualizado com sucesso.');
    }

    // Exclui um produto
    public function destroy(Clube $clube, Produto $produto)
    {
        $produto->delete();
        return redirect()->route('clubes.produtos.index', $clube->id)->with('success', 'Produto excluído com sucesso.');
    }
}
