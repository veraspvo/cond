@extends('layouts.app')
@section('title', 'Editar o Documento da Divisão')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Editar o Documento {{ $documento->nome_documento }} - {{ $divisao->divisao }}/{{ $divisao->om }}</h2>

    <x-alert />

    <form action="{{ route('documentos_divisoes.update', $documento_divisao->id) }}" method="post">
        @csrf
        @method('put')
        <div class='mb-3 p-2 rounded border border-secondary'>
            <div class='mt-3'>
                <label for="">OM: {{ $divisao->om }}</label>
            </div>
            <div class='mt-3'>
                <label for="">Divisão: {{ $divisao->divisao }}</label>
            </div>
            <div class='mt-3'>
                <label for="">Nome do Documento: {{ $documento->nome_documento }}</label>
            </div>
            <div class='mt-3'>
                <label>Abrangência</label>
                <select name="abrangencia" id="abrangencia">
                    <option value="">Selecione</option>
                    @if( $documento_divisao->abrangencia == 'D')
                        <option value="D" selected>Divisão</option>
                        <option value="O">OM</option>
                    @elseif( $documento_divisao->abrangencia == 'O')
                        <option value="D">Divisão</option>
                        <option value="O" selected>OM</option>
                    @else
                        <option value="D">Divisão</option>
                        <option value="O">OM</option>
                    @endif
                </select>
            </div>
            <div class='mt-3'>
                <label>Ativo</label>
                <select name="ativo" id="ativo">
                    <option value="">Selecione</option> 
                    @if( $documento_divisao->ativo == '1')
                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>
                    @elseif( $documento_divisao->ativo == '0')
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>
                    @else
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    @endif
                </select>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
        <a class="btn btn-primary" href="{{ route('documentos_divisoes.index') }}">Voltar</a> 
    </form>

    <script>

    </script>
</div>
@endsection