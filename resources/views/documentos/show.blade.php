@extends('layouts.app')
@section('title', 'Detalhes do Documento')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Detalhes do Documento {{ $documento->nome_documento }}</h2>

    <x-alert />

    <div class='mb-2 p-2 pb-0 rounded border border-secondary'>
        <ul>
            <li><strong>Id:</strong> {{ $documento->id }}</li>
            <li><strong>Nome:</strong> {{ $documento->nome_documento }}</li>
        </ul>
    </div>
    <form class="text-white" action="{{ route('documentos.destroy', $documento->id) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-primary" type="submit" value="Excluir">Excluir</button>
        <a class="btn btn-primary" href="{{ route('documentos.index') }}">Voltar</a>
    </form>
</div>
@endsection