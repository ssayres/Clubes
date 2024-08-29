<!-- resources/views/assinaturas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Minhas Assinaturas</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($assinaturas && $assinaturas->count() > 0)
        <div class="row">
            @foreach($assinaturas as $assinatura)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Clube: {{ $assinatura->clube->nome }}</h5>
                            <p class="card-text"><strong>Status:</strong> {{ ucfirst($assinatura->status) }}</p>
                            <!-- Usa format apenas se $assinatura->data_inicio não for null -->
                            <p class="card-text"><strong>Data de Início:</strong> {{ $assinatura->data_inicio ? $assinatura->data_inicio->format('d/m/Y') : 'N/A' }}</p>
                            <a href="{{ route('assinaturas.show', $assinatura->id) }}" class="btn btn-secondary">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Você ainda não possui assinaturas.
        </div>
    @endif
</div>
@endsection
