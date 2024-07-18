@extends('layouts.app')
@section('title', 'Editar o Documento')
@section('content')
    <div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

        <h2>Editar o Documento {{ $documento->nome_documento }}</h2>

        <x-alert />


        <form action="{{ route('documentos.update', $documento->id) }}" method="post">
            @csrf
            @method('put')
            <div class='mb-3 p-2 rounded border border-secondary'>
                <label>Nome do Documento</label>
                <div class='mt-1'>
                    @include('documentos.partials.form')
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
            <a class="btn btn-primary" href="{{ route('documentos.index') }}">Voltar</a>
        </form>

    </div>
@endsection