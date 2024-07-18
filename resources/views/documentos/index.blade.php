@extends('layouts.app')
@section('title', 'Documentos')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">
    <h2 class="mt-3 mb-3">Documentos</h2>

    <x-alert />

    <div>
        <a class="btn btn-primary mb-2" href=" {{ route('documentos.create') }}">Novo</a>
    </div>
    
    <div class="border border-secondary rounded">
        <table class = "table table-striped table-hover mt-1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documentos as $documento)
                    <tr>
                        <th>{{ $documento->id }}</th>
                        <td>{{ $documento->nome_documento }}</td>
                        <td class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <a href=" {{ route('documentos.edit', $documento->id) }}">Editar</a>
                            <a href=" {{ route('documentos.show', $documento->id) }}">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum documento encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="m-0 mt-2">
        {{ $documentos->links() }}
    </div>
    <p class="m-0">
       <!--Exibindo {{ (($documentos->perPage()*($documentos->currentPage()-1)))  }} a {{ $documentos->count()+(($documentos->perPage()*($documentos->currentPage()-1))) }} de {{ $documentos->total() }} registros
        -->
        Página {{ $documentos->currentPage() }} de {{ $documentos->lastPage() }}
    </p>      
</div>

@endsection
