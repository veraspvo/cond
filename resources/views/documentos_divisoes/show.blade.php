@extends('layouts.app')
@section('title', 'Excluir Documento')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2 class="">Excluir Documento da Divisão</h2>

    <x-alert />

    <div class='mb-2 p-2 rounded border border-secondary'>
        <ul class="">
            <li><strong>Id:</strong> {{ $documento_divisao->id }}</li>
            <li><strong>OM:</strong> {{ $dados_divisao->om }}</li>
            <li><strong>Divisão:</strong> {{ $dados_divisao->divisao }}</li>
            <li><strong>Nome do Documento:</strong> {{ $dados_documento->nome_documento }}</li>
            @if ($documento_divisao->abrangencia == 'D')
                <li><strong>Abrangência:</strong> Divisão </li>
            @else
                <li><strong>Abrangência:</strong> OM </li>
            @endif
            @if ($documento_divisao->ativo == 1)
                <li><strong>Ativo:</strong> Sim </li>
            @else
                <li><strong>Ativo:</strong> Não </li>
            @endif

        </ul>
    </div>
    <form class="" action="{{ route('documentos_divisoes.destroy', $documento_divisao->id) }}" method="post">
        @csrf
        @method('delete')
        <a class="btn btn-primary" href="{{ route('documentos_divisoes.index') }}">Voltar</a>
        <button class="btn btn-primary" type="submit" value="Excluir">Excluir</button>
    </form>
</div>
@endsection