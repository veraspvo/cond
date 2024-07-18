@extends('layouts.app')
@section('title', 'Divisões')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">
    <h2 class="mt-3 mb-3">Divisões</h2>

    <x-alert />

    <div>
        <a class="btn btn-primary mb-2" href=" {{ route('divisoes.create') }}">Novo</a>
    </div>

    <div class="border border-secondary rounded">
        <table class = "table table-striped table-hover mt-1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>OM</th>
                    <th>Divisão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($divisoes as $divisao)
                    <tr>
                        <th>{{ $divisao->id }}</th>
                        <td>{{ $divisao->om }}</td>
                        <td>{{ $divisao->divisao }}</td>
                        <td class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <a href="{{ route('divisoes.edit', $divisao->id) }}" class="">Editar</a>
                            <a href="{{ route('divisoes.show', $divisao->id) }}" class="">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhuma Divisão encontrada!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="t-0 m-0">
        {{ $divisoes->links() }}
    </div>
    <p class="text-align-left t-0 m-0">
       <!--Exibindo {{ (($divisoes->perPage()*($divisoes->currentPage()-1)))  }} a {{ $divisoes->count()+(($divisoes->perPage()*($divisoes->currentPage()-1))) }} de {{ $divisoes->total() }} registros
        -->
        Página {{ $divisoes->currentPage() }} de {{ $divisoes->lastPage() }}
    </p>      
</div>

@endsection
