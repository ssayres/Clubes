<!-- resources/views/clubes/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $clube->nome }}</h2>
    <p><strong>Categoria:</strong> {{ $clube->categoria }}</p>
    <p><strong>Descrição:</strong> {{ $clube->descricao }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($clube->preco, 2, ',', '.') }}</p>
    <p><strong>Periodicidade:</strong> {{ ucfirst($clube->periodicidade) }}</p>

    <!-- Botão para assinar o clube -->
    <a href="{{ route('assinaturas.create', $clube->id) }}" class="btn btn-success">Assinar este Clube</a>
</div>
@endsection
