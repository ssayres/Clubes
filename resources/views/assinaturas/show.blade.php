<!-- resources/views/assinaturas/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes da Assinatura</h2>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Clube: {{ $assinatura->clube->nome }}</h5>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($assinatura->status) }}</p>
            <p class="card-text"><strong>Data de Início:</strong> {{ $assinatura->data_inicio->format('d/m/Y') }}</p>
            @if($assinatura->data_fim)
                <p class="card-text"><strong>Data de Fim:</strong> {{ $assinatura->data_fim->format('d/m/Y') }}</p>
            @else
                <p class="card-text"><strong>Data de Fim:</strong> N/A</p>
            @endif
        </div>
    </div>

    <a href="{{ route('assinaturas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
