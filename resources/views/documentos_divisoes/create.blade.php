@extends('layouts.app')
@section('title', 'Inclusão - Documento da Divisão')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Inclusão - Documento da Divisão</h2>

    <x-alert/>

    <form action="{{ route('documentos_divisoes.store')}}" method="post">
        @csrf
        <div class='mb-2 p-2 rounded border border-secondary'>
            <div class='mt-3 '>
                <label>OM</label>
                <select name="om" id="om">
                    <option value="">Selecione</option>
                    @forelse ($organizacoes as $organizacao)
                        <option value="{{ $organizacao->om }}">{{ $organizacao->om }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class='mt-3'>
                <label>Divisão</label>
                <select name="divisao_id" id="divisao_id">
                    <option value="">Selecione</option>
                </select>
            </div>
            <div class='mt-3'>
                <label>Documento</label>
                <select name="documento_id" id="documento_id">
                    <option value="">Selecione</option>
                    @forelse ($documentos as $documento)
                        <option value="{{ $documento->id }}">{{$documento->nome_documento }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class='mt-3'>
                <label>Abrangência</label>
                <select name="abrangencia" id="abrangencia">
                    <option value="">Selecione</option>           
                    <option value="D">Divisão</option>
                    <option value="O">OM</option>
                </select>
            </div>
            <div class='mt-3'>
                <label>Ativo</label>
                <select name="ativo" id="ativo">
                    <option value="">Selecione</option>           
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
        <a class="btn btn-primary" href="{{ route('documentos_divisoes.index') }}">Voltar</a>

    </form>
        
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            //Receber seletores do HTML
            var imputSelectOm = document.querySelector('#om');
            var imputSelectDivisao = document.querySelector('#divisao_id');
            //Aguardar o usuario selecionar a OM
            imputSelectOm.addEventListener('change', () => {
                //Pesquisar Divisao
                pesquisarDivisao();
            });

            function pesquisarDivisao() {
                imputSelectDivisao.innerHTML = `<option value="">Carregando...</option>`;
                var selectDivisoes = "{{ route('divisoes.select') }}";

                axios.post(selectDivisoes, {
                    om: imputSelectOm.value,
                })
                .then(function (response) {
                    imputSelectDivisao.innerHTML = `<option value="">Selecione</option>`;
                    response.data.forEach(row => {
                        imputSelectDivisao.innerHTML += `<option value="${row.id}">${row.divisao}</option>`;
                    });
                })
                .catch(function (error) {
                    imputSelectDivisao.innerHTML = `<option value="">Nenhuma Divisão Cadastrada!</option>`;
                });

            }
        })
    </script>
</div>
@endsection