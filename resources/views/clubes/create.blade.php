<!-- resources/views/clubes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Criar Novo Clube</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clubes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Clube</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="periodicidade" class="form-label">Periodicidade</label>
            <select name="periodicidade" id="periodicidade" class="form-select" required>
                <option value="mensal">Mensal</option>
                <option value="trimestral">Trimestral</option>
                <option value="anual">Anual</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Criar Clube</button>
    </form>
</div>
@endsection
