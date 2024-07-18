<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\StoreControleRequest;
use App\Models\Controle;
use Illuminate\Support\Facades\Cache;
class ControleController extends Controller
{
    public function index()
    {
        //Selecionar todos os registros da tabela controles
        //FALTA PEGAR OM E DIVISÃO DO USUÁRIO LOGADO!
        $om_usuario = 'CINDACTA3';
        $divisao_usuario = 'DT';
        $documentos_divisoes = DB::table('documentos_divisoes')
        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
        ->where('divisoes.om', '=', $om_usuario)
        ->where('divisoes.divisao', '=', $divisao_usuario)
        ->select('documentos_divisoes.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->get();
        //dd($documentos_divisoes);
        
        return view('controles.index', compact('documentos_divisoes'));
    }
    public function store(StoreControleRequest $request) 
    {
        //Pegar ano atual
        $data = date("Y-m-d");
        $ano = date("Y");
        //Selecionar o maior con_numero_documento da tabela controles do ano atual
        //$controles = Controle::whereYear('con_data', $ano)->max('con_numero_documento')->select('con_numero_documento')->get();
        $controle = Controle::whereYear('con_data', $ano)->where('documentos_divisoes_id', $request->documentos_divisoes_id)
        ->orderby('con_numero_documento', 'desc')->first();
        //dd($controle);
        if (!$controle)    {
            $novo_numero = 1;
        } else {
            $novo_numero = $controle->con_numero_documento + 1;
        }
        //dd($request);
        //Verificar se o novo numero ja existe
        $verifica_controle = Controle::whereYear('con_data', $ano)->where('documentos_divisoes_id', $request->documentos_divisoes_id)->where('con_numero_documento', $novo_numero)->first();
        if ($verifica_controle) {
            return BACK()->with('error', 'Erro ao gerar novo número. Tente novamente!');
        }
        else {
            $controle = Controle::create([
                'documentos_divisoes_id' => $request->documentos_divisoes_id,
                'con_data' => $data,
                'con_observacao' => $request->con_observacao,
                'con_login' => $request->con_login, // Tem que pegar a variável do login
                'con_setor' => $request->con_setor, // tem que pegar a variável do login
                'con_numero_documento' => $novo_numero,
            ]);
        }
        $documento_divisao = DB::table('documentos_divisoes')
        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
        ->where('documentos_divisoes.id', '=', $request->documentos_divisoes_id)
        ->select('documentos_divisoes.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->get();
        //dd($documento_divisao);
        $nomeDocumento = $documento_divisao[0]->nome_documento .' ('. $documento_divisao[0]->om .'/' .$documento_divisao[0]->divisao.' '.$request->con_setor.')';
        return back()->with('message_novo_numero', 'Número:  '. $novo_numero .' '.$nomeDocumento);
    }
    public function consulta()
    {
        //Selecionar todos os registros da tabela controles
        //FALTA PEGAR OM E DIVISÃO DO USUÁRIO LOGADO!
        $om_usuario = 'CINDACTA3';
        $divisao_usuario = 'DT';
        $documentos_divisoes = DB::table('documentos_divisoes')
        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
        ->where('divisoes.om', '=', $om_usuario)
        ->where('divisoes.divisao', '=', $divisao_usuario)
        ->select('documentos_divisoes.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->get();
        //dd($documentos_divisoes);
        
        return view('controles.consulta', compact('documentos_divisoes'));

    }
    public function search(request $request)
    {
        //Selecionar todos os registros da tabela controles
        //FALTA PEGAR OM E DIVISÃO DO USUÁRIO LOGADO!
        $om_usuario = 'CINDACTA3';
        $divisao_usuario = 'DT';
//        $documentos_divisoes = DB::table('documentos_divisoes')
//        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
//        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
//        ->where('divisoes.om', '=', $om_usuario)
//        ->where('divisoes.divisao', '=', $divisao_usuario)
//        ->where('documentos_divisoes.documento_id', '=', $request->documentos_divisoes_id)
//        ->select('documentos_divisoes.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->get();
        //dd($documentos_divisoes);
//        $controles1 = DB::table('controles')
//        ->join('documentos_divisoes', 'controles.documentos_divisoes_id', '=', 'documentos_divisoes.id')
//        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
//        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
//        ->where('divisoes.om', '=', $om_usuario)
//        ->where('divisoes.divisao', '=', $divisao_usuario)
//        ->where('controles.documentos_divisoes_id', '=', $request->documentos_divisoes_id)
//        ->select('controles.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->paginate(10);
        $controles = Controle::join('documentos_divisoes', 'controles.documentos_divisoes_id', '=', 'documentos_divisoes.id')
        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
        ->where('divisoes.om', '=', $om_usuario)
        ->where('divisoes.divisao', '=', $divisao_usuario)
        ->where('controles.documentos_divisoes_id', '=', $request->documentos_divisoes_id)
        ->orderBy('controles.con_numero_documento', 'desc')
        ->select('controles.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')->Paginate(10)->withQueryString();
        //dd($controles);
        
        return view('controles.showConsulta', compact('controles'));

    }
}
