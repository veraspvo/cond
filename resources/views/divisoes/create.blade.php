@extends('layouts.app')
@section('title', 'Nova Divisão')
@section('content')

<div class="container mt-5 p-2 pt-0 rounded w-50 bg-white border border-secondary">

    <h2>Nova Divisão</h2>

    <x-alert/>

    <form action="{{ route('divisoes.store')}}" method="post">
        @csrf
        <div class='mb-2 p-2 rounded border border-secondary'>
            <div class='mt-3 '>

                <label>OM</label>
                <select name="om" id="om">
                    <option value="">Selecione</option>
                    @forelse ($organizacoes as $organizacao)
                        <option value="{{ $organizacao->omi_codigo }}">{{ $organizacao->omi_codigo }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class='mt-3'>
                <label>Divisão</label>
                <select name="divisao" id="divisao">
                    <option value="">Selecione...</option>
                </select>
            </div>
        </div>       
        <button class="btn btn-primary " type="submit">Cadastrar</button>
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//********* NÃO CONSEGUI UTILIzar a rotina abaixo...****************************************************
//                fetch(selectDivisoes, {omi_codigo:imputSelectOm.value})
//                  .then(response => {
//                     console.log(response.status);
//                 });
//                  fetch(selectDivisoes,
//                       {  
//                          method: "POST",
//                          body: JSON.stringify({omi_codigo:imputSelectOm.value})
//                       })
//                          .then(function(res){ console.log(res) })
//                          .catch(function(res){ console.log(res) })
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//
            }
            
        })      
    </script>
</div>
@endsection