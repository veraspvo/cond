@extends('layouts.app')
@section('title', 'Detalhes da Divisão')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Exclusão da Divisão {{ $divisao->om }}/{{ $divisao->divisao }}</h2>

    <x-alert />

    <div class='mb-2 p-2 rounded border border-secondary'>
        <ul class="">
            <li><strong>Id:</strong> {{ $divisao->id }}</li>
            <li><strong>OM:</strong> {{ $divisao->om }}</li>
            <li><strong>Divisão:</strong> {{ $divisao->divisao }}</li>
        </ul>
    </div>
    <form class="" action="{{ route('divisoes.destroy', $divisao->id) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-primary" type="submit" value="Excluir">Excluir</button>
        <a class="btn btn-primary" href="{{ route('divisoes.index') }}">Voltar</a>
    </form>

</div>
@endsection