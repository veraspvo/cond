<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentoDivisao;
use App\Models\Divisao;
use App\Models\Documento;
use App\Http\Requests\StoreDocumentoDivisaoRequest;
use Illuminate\Support\Facades\DB;

class DocumentoDivisaoController extends Controller
{
    public function index()
    {
//********************************************* */
//$users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
//********************************************* */    
        $documentos_divisoes = DB::table('documentos_divisoes')
        ->join('divisoes', 'documentos_divisoes.divisao_id', '=', 'divisoes.id')
        ->join('documentos', 'documentos_divisoes.documento_id', '=', 'documentos.id')
        ->select('documentos_divisoes.*', 'divisoes.om', 'divisoes.divisao','documentos.nome_documento')
        ->paginate(10); 
        //dd($documentos_divisoes);

        //$documentos_divisoes = DocumentoDivisao::paginate(2);  
     
        return view('documentos_divisoes.index', compact('documentos_divisoes'));
    }
    public function create()
    {
        //Recuperar os registros da tabela organizacao_militar
        //$organizacoes = OrganizacaoMilitar::all();
        $organizacoes = Divisao::orderBy('om', 'asc')->get()->unique('om');
        $documentos = Documento::orderBy('nome_documento', 'asc')->get();
        //dd( $documentos);
        ////Carregar a View
        return view('documentos_divisoes.create', compact('organizacoes', 'documentos'));
    }

    public function store(StoreDocumentoDivisaoRequest $request)
    {
        $documento_check = DocumentoDivisao::where('documento_id', $request->documento_id)
                            ->where('divisao_id',$request->divisao_id)
                            ->first();
        if ($documento_check) {
            return redirect()->route('documentos_divisoes.index')
            ->with('error', "Documento já cadastrado para a divisão!");
        }

        $documento_divisao = DocumentoDivisao::create($request->all());
        return redirect()->route('documentos_divisoes.index')
        ->with('success', 'Documento cadastrado com sucesso');;
    }

    public function show(string $id)
    {
       $documento_divisao = DocumentoDivisao::find($id);
        if (!$documento_divisao) {
            return redirect()->route('documentos_divisoes.index')->with('error', 'Documento não encontrado!');
        }
        $dados_divisao = Divisao::find($documento_divisao->divisao_id);
        $dados_documento = Documento::find($documento_divisao->documento_id); 
            
        //dd($documento_divisao);

        return view('documentos_divisoes.show', compact('documento_divisao', 'dados_divisao', 'dados_documento'));
    }

    public function destroy(string $id)
    {
        //$documento_divisao = DocumentoDivisao::find($id);
        if (!$documento_divisao = DocumentoDivisao::find($id)) {
            return redirect()->route('documentos_divisoes.index')->with('error', 'Docuemtno não encontrado!');
        }
        $documento_divisao->delete();
        
        return redirect()
            ->route('documentos_divisoes.index')
            ->with('success', 'Documento excluído com sucesso!');
    }
    public function update(Request $request, string $id)
    {
        if (!$documento_divisao = DocumentoDivisao::find($id)) {
            return redirect()->route('documentos_divisoes.index')->with('error', 'Documento não encontrado!');
        }
        $documento_divisao->update($request->all());
        return redirect()
            ->route('documentos_divisoes.index')
            ->with('success', 'Documento atualizado com sucesso!');
        
    }
    public function edit(string $id)
    {
       // $organizacoes = OrganizacaoMilitar::orderBy('omi_codigo', 'asc')->get();

        $documento_divisao = DocumentoDivisao::find($id);
        $divisao = Divisao::find($documento_divisao->divisao_id);
        $documento = Documento::find($documento_divisao->documento_id);
        //dd($documento_divisao, $divisao, $documento);
        //$divisao = SetorOrganizacaoMilitar::where('omi_codigo', $divisao->om, '=')->where('som_eh_divisao','S','=')->orderBy('set_codigo', 'asc')->get();
        if (!$documento_divisao) {
            return redirect()->route('documentos_divisoes.index')->with('error', 'Documento não encontrado!');
        }
        return view('documentos_divisoes.edit', compact('documento_divisao', 'divisao', 'documento'));
    }
 
}
