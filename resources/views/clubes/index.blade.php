<!-- resources/views/clubes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clubes de Assinatura</h2>
        <a href="{{ route('clubes.create') }}" class="btn btn-primary">Criar Novo Clube</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($clubes as $clube)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $clube->nome }}</h5>
                        <p class="card-text">{{ $clube->categoria }}</p>
                        <p class="card-text">{{ $clube->descricao }}</p>
                        <p class="card-text"><strong>Preço:</strong> R$ {{ $clube->preco }}</p>
                        <p class="card-text"><strong>Periodicidade:</strong> {{ ucfirst($clube->periodicidade) }}</p>
                        <a href="{{ route('clubes.show', $clube->id) }}" class="btn btn-secondary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Botão para carregar mais clubes -->
    <button id="load-more" class="btn btn-primary">Carregar Mais</button>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let page = 1;
        $('#load-more').on('click', function () {
            page++;
            $.ajax({
                url: '/clubes?page=' + page,
                type: 'GET',
                success: function (data) {
                    $('.row').append(data.html); // Adiciona os clubes retornados à lista existente
                }
            });
        });
    });
</script>