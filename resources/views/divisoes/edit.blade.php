@extends('layouts.app')
@section('title', 'Editar a Divisão')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Edição da Divisão {{ $divisao->om }}/{{ $divisao->divisao }}</h2>

    <x-alert />

    <!--<form action="{{ route('divisoes.update', $divisao->id) }}" method="post"> -->
    <form action="{{ route('divisoes.update', $divisao->id) }}" method="post">
        @csrf
        @method('put')
        <div class='mb-2 p-2 rounded border border-secondary'>
            <div class='mt-3'>
                <label>OM</label>
                <select name="om" id="om">
                    <option value="{{ $divisao->om }}">{{ $divisao->om }}</option>
                    @forelse ($organizacoes as $organizacao)
                        <option value="{{ $organizacao->omi_codigo }}">{{ $organizacao->omi_codigo }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class='mt-3'>
                <label>Divisão</label>
                <select name="divisao" id="divisao">
                    <option value="{{ $divisao->divisao }}">{{ $divisao->divisao }}</option>
                    @forelse ($divisoes as $divisoes)
                        <option value="{{ $divisoes->set_codigo }}">{{ $divisoes->set_codigo }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <!-- Comentada linha abaixo em virtude de não ser possível alterar a OM/Divisão -->
        <!--<input class="btn btn-primary " type="submit" value="Enviar"> -->
        <a class="btn btn-primary " href="{{ route('divisoes.index') }}">Voltar</a>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            //Receber seletores do HTML
            var imputSelectOm = document.querySelector('#om');
            var imputSelectDivisao = document.querySelector('#divisao');
            //Aguardar o usuario selecionar a OM
            imputSelectOm.addEventListener('change', () => {
                //Pesquisar Divisao
                imputSelectDivisao.innerHTML = `<option value="">Carregando...</option>`;

                pesquisarDivisao();
            });
            function pesquisarDivisao() {
                //imputSelectDivisao.innerHTML = `<option value="">Carregando...</option>`;

                var selectDivisoes = "{{ route('setores.select') }}";

                axios.post(selectDivisoes, {
                    omi_codigo: imputSelectOm.value,
                })
                .then(function (response) {
                    imputSelectDivisao.innerHTML = `<option value="">Selecione</option>`;
                    response.data.forEach(row => {
                        imputSelectDivisao.innerHTML += `<option value="${row.set_codigo}">${row.som_descricao}</option>`;
                    });
                })
                .catch(function (error) {
                    imputSelectDivisao.innerHTML += `<option value="">Nenhuma Divisão Cadastrada!</option>`;;
                });

            }

        })      
    </script>
</div>
@endsection