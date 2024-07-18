@extends('layouts.app')
@section('title', 'Divisões')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">
    <h2 class="mt-3 mb-3">Documentos da Divisão</h2>

    <x-alert />
  
    <div class="justify-right">
        <a class="btn btn-primary mb-2" href="{{ route('documentos_divisoes.create')}} ">Novo</a>
    </div>
    
    <div class="border border-secondary rounded">
        <table class = "table table-striped table-hover mt-1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>OM</th>
                    <th>Divisão</th>
                    <th>Documento</th>
                    <th>Abrangência</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documentos_divisoes as $documento_divisao)
                    <tr>
                        <th>{{ $documento_divisao->id }}</th>
                        <td>{{ $documento_divisao->om }}</td>
                        <td>{{ $documento_divisao->divisao }}</td>
                        <td>{{ $documento_divisao->nome_documento }}</td>
                        @if ($documento_divisao->abrangencia == 'D')
                            <td>Divisão</td>
                        @else
                            <td>OM</td>
                        @endif
                        @if ($documento_divisao->ativo == 1)
                            <td>Sim</td>
                        @else
                            <td>Não</td>
                        @endif
                        <td class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <a href="{{ route('documentos_divisoes.edit', $documento_divisao->id)}}">Editar</a>
                            <a href="{{ route('documentos_divisoes.show', $documento_divisao->id)}}">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhum Documento encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="m-0 mt-2">
        {{ $documentos_divisoes->links() }}
    </div>
    <p class="m-0">
       <!--Exibindo {{ (($documentos_divisoes->perPage()*($documentos_divisoes->currentPage()-1)))  }} a {{ $documentos_divisoes->count()+(($documentos_divisoes->perPage()*($documentos_divisoes->currentPage()-1))) }} de {{ $documentos_divisoes->total() }} registros
        -->
        Página {{ $documentos_divisoes->currentPage() }} de {{ $documentos_divisoes->lastPage() }}
    </p> 
</div>

@endsection
