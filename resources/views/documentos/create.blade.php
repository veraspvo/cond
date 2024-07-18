@extends('layouts.app')
@section('title', 'Inclusão - Documento')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Documento - Inclusão</h2>

    <x-alert />

    <form action="{{ route('documentos.store')}}" method="post">
        @csrf
        <div class='mb-2 p-2 rounded border border-secondary'>
            @include('documentos.partials.form')
            <!--<input type="text" name="nome_documento" placeholder="Nome do documento" value="{{ old('nome_documento') }}"> <!-- old('') Helper -->
            <!--<input type="submit" value="Cadastrar"> -->
        </div>
        <input class="btn btn-primary" type="submit" value="Cadastrar">
        <a class="btn btn-primary" href="{{ route('documentos.index') }}">Voltar</a>
    </form>
</div>
@endsection