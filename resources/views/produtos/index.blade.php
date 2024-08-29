<!-- resources/views/produtos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Produtos do Clube: {{ $clube->nome }}</h2>
        <a href="{{ route('clubes.produtos.create', $clube->id) }}" class="btn btn-primary">Adicionar Produto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text"><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
                        <a href="{{ route('clubes.produtos.show', [$clube->id, $produto->id]) }}" class="btn btn-secondary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
