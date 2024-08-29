<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo ao Sistema de Gestão de Clubes de Assinatura!</h1>
    @guest
        <p>Por favor, <a href="{{ route('login') }}">faça login</a> ou <a href="{{ route('register') }}">registre-se</a> para começar.</p>
    @else
        <p>Você está logado como {{ Auth::user()->name }}. Acesse o painel de <a href="{{ route('clubes.index') }}">clubes</a>.</p>
    @endguest
</div>
@endsection
