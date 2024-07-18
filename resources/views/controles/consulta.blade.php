<div>
    <!-- An unexamined life is not worth living. - Socrates -->
</div>
@extends('layouts.app')
@section('title', 'Controle')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">
    <h2 class="mt-3 mb-3">Consulta</h2>

    <x-alert />
    <form action="{{ route('controles.search') }}" method="get">
        @csrf

        <div class='mb-2 p-2 rounded border border-secondary'>
            <label>Documento</label>
            <select name="documentos_divisoes_id" id="documentos_divisoes_id">
                <option value="">Selecione</option>
                @forelse ($documentos_divisoes as $documento_divisao)
                    <option value="{{ $documento_divisao->id }}">{{ $documento_divisao->nome_documento }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="m-0">
            <button class="btn btn-primary btn-block mt-3 " type="submit">Consultar</button>
        </div>
        <!-- Aguardando rotina de login para capturar a OM, Divisão e Setor do Usuário logado -->
        <input class="invisible m-0" type="text" name='con_login' id="con_login" value="VERASPVO">
        <input class="invisible m-0" type="text" name='con_setor' id="con_setor" value="TIAd">
        <input class="invisible m-0" type="text" name='con_numero_documento' id="con_numero_documento" value="">
    </form>
</div>

@endsection
