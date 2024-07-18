<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetorOrganizacaoMilitar;
use Illuminate\Http\JsonResponse;

class SetorOrganizacaoMilitarController extends Controller
{
    public function select(Request $request) : JsonResponse
    {
        //dd( $request->omi_codigo);
        //Recuperar divisões com base no omi_codigo informado
        $divisoes = SetorOrganizacaoMilitar::where('omi_codigo', $request->omi_codigo, '=')->where('som_eh_divisao','S','=')->orderBy('set_codigo')->get();
        //Retornar sucesso quando encontrar divisao
        //dd($divisoes);
        if($divisoes) {
            return response()->json($divisoes,200);
        }
        //Retornar erro quando não encontrar divisao
        return response()->json(['message' => 'Nenhuma Divisão encontrada'],422);
    }

}
