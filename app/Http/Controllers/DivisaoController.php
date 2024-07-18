<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDivisaoRequest;
use App\Http\Requests\UpdateDivisaoRequest;
use App\Models\Divisao;
use App\Models\OrganizacaoMilitar;
use App\Models\SetorOrganizacaoMilitar;
use Illuminate\Http\JsonResponse;


class DivisaoController extends Controller
{
    public function index()
    {
        $divisoes = Divisao::orderBy('om', 'asc')->orderBy('divisao', 'asc')->paginate(15);  // Divisao::all();
        
        return view('divisoes.index', compact('divisoes'));
    }
    public function create()
    {
        //Recuperar os registros da tabela organizacao_militar
        //$organizacoes = OrganizacaoMilitar::all();
        $organizacoes = OrganizacaoMilitar::orderBy('omi_codigo', 'asc')->get();
        //dd( $organizacoes);
        ////Carregar a View
        return view('divisoes.create', compact('organizacoes'));
    }
    //public function store()
    public function store(StoreDivisaoRequest $request)
    {
        $divisao_check = Divisao::where('om', $request->om)
                            ->where('divisao',$request->divisao)
                            ->first();
        if ($divisao_check) {
            return redirect()->route('divisoes.create')
            ->with('message', "Divisão $request->om/$request->divisao ja existe");
//            return redirect()->route('divisoes.index')
//            ->with('message', "Divisão $request->om/$request->divisao ja existe");
        }

         $divisao = Divisao::create($request->all());
         return redirect()->route('divisoes.index')
         ->with('success', 'Divisão cadastrada com sucesso');;
    }

    public function select(Request $request) : JsonResponse
    {
        //dd( $request->omi_codigo);
        //Recuperar divisões com base no omi_codigo informado
        //$divisoes = Divisao::get();
        $divisoes = Divisao::where('om', $request->om)->get();
        //$organizacoes = OrganizacaoMilitar::orderBy('omi_codigo', 'asc')->get();

        //Retornar sucesso quando encontrar divisao
        //dd($divisoes);
        if($divisoes) {
            return response()->json($divisoes,200);
        }
        //Retornar erro quando não encontrar divisao
        return response()->json(['message' => 'Nenhuma Divisão encontrada'],422);
    }

    public function show(string $id)
    {
        $divisao = Divisao::find($id);
        if (!$divisao) {
            return redirect()->route('divisoes.index')->with('message', 'Divisão não encontrada!');
        }
        return view('divisoes.show', compact('divisao'));
    }

    public function destroy(string $id)
   {
       $divisao = Divisao::find($id);
       if (!$divisao = Divisao::find($id)) {
           return redirect()->route('divisoes.index')->with('message', 'Divisão não encontrada!');
       }
       $divisao->delete();
       
       return redirect()
           ->route('divisoes.index')
           ->with('success', 'Divisão excluída com sucesso!');
   }

   public function update(UpdateDivisaoRequest $request, string $id)
   {
        //dd('Atualizando ...');
        if (!$divisao = Divisao::find($id)) {
            return back()->with('message', 'Divisão não encontrada!');
        }
        $data = $request->only('divisao', 'om');
        //*************************************************************************************** */
        //Caso exista um campo requerido que só deva ser atualizado caso seja informado algum valor
        //if ($request->password) {
        //    $data['password'] = bcrypt($request->password);
        //}
        //$documento->update($request->only([
        //    'nome_documento',
        //]));
        //**************************************************************************************** */
        $divisao->update($data);

        return redirect()
            ->route('divisoes.index')
            ->with('success', 'Divisão atualizada com sucesso');
    }
    public function edit(string $id)
    {
        $organizacoes = OrganizacaoMilitar::orderBy('omi_codigo', 'asc')->get();

        $divisao = Divisao::find($id);
        $divisoes = SetorOrganizacaoMilitar::where('omi_codigo', $divisao->om, '=')->where('som_eh_divisao','S','=')->orderBy('set_codigo', 'asc')->get();
        if (!$divisao = Divisao::find($id)) {
            return redirect()->route('divisoes.index')->with('message', 'Divisão não encontrada');
        }
        return view('divisoes.edit', compact('divisao', 'organizacoes', 'divisoes'));
    }
 
}
