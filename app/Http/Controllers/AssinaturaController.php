<?php

namespace App\Http\Controllers;

use App\Models\Assinatura;
use App\Models\Clube;
use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
    // Exibe todas as assinaturas do usuário autenticado
    public function index()
    {
        $assinaturas = auth()->user()->assinaturas()->with('clube')->get();
        return view('assinaturas.index', compact('assinaturas'));
    }

    // Exibe o formulário para assinar um clube
    public function create(Clube $clube)
    {
        return view('assinaturas.create', compact('clube'));
    }

    // Armazena uma nova assinatura no banco de dados
    public function store(Request $request, Clube $clube)
    {
        $request->validate([
            'status' => 'required',
            'data_inicio' => 'required|date',
        ]);

        Assinatura::create([
            'user_id' => auth()->id(),
            'clube_id' => $clube->id,
            'status' => $request->status,
            'data_inicio' => $request->data_inicio,
            'data_fim' => null, // ou uma data conforme a lógica da sua aplicação
        ]);

        return redirect()->route('assinaturas.index')->with('success', 'Assinatura criada com sucesso.');
    }

    // Exibe os detalhes de uma assinatura específica
    public function show(Assinatura $assinatura)
    {
        // Verifica se a assinatura pertence ao usuário autenticado
        if ($assinatura->user_id !== auth()->id()) {
            abort(403); // Acesso negado
        }

        return view('assinaturas.show', compact('assinatura'));
    }
}
