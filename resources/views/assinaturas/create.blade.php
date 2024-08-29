<!-- resources/views/assinaturas/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assinar o Clube: {{ $clube->nome }}</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assinaturas.store', $clube->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="ativa">Ativa</option>
                <option value="pausada">Pausada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Assinar</button>
    </form>
</div>
@endsection
