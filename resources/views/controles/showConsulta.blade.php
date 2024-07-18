@extends('layouts.app')
@section('title', 'Controle')
@section('content')
<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">
    <h2 class="mt-3 mb-3">Consulta</h2>

    <x-alert />

    <div class="border border-secondary rounded">
        <table class = "table table-striped table-hover mt-1">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Número</th>
                    <th>Usuário</th>
                    <th>Setor</th>
                    <th>Data</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($controles as $controle)
                    <tr>
                        <td>{{ $controle->nome_documento }}</td>
                        <td>{{ $controle->con_numero_documento }}</td>
                        <td>{{ $controle->con_login }}</td>
                        <td>{{ $controle->con_setor }}</td>
                        <td>{{ date('d/m/Y', strtotime($controle->con_data)) }}</td>
                        <td>{{ $controle->con_observacao }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum Documento encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="m-0 mt-2">
        {{ $controles->links() }}
    </div>
    <p class="m-0">
        Página {{ $controles->currentPage() }} de {{ $controles->lastPage() }}
    </p>
</div>

@endsection
