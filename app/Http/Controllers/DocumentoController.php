<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Documento;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;

class DocumentoController extends Controller
{
   public function index()
   {
       $documentos = Documento::orderBy('nome_documento', 'asc')->paginate(10);  // Documento::all();
       
       return view('documentos.index', compact('documentos'));

   }

   public function create()
   {
       return view('documentos.create');
   }

   //public function store()
   public function store(StoreDocumentoRequest $request)
   {
        $documento = Documento::create($request->all());
        return redirect()->route('documentos.index')
        ->with('success', 'Documento cadastrado com sucesso');;
   }
   public function edit(string $id)
   {
       $documento = Documento::find($id);
       //$documento = Documento::where('id','=',$id)->first();
       //$documento = Documento::where('id',$id)->first();
       //$documento = Documento::where('id',$id)->firstOrFail(); // mais usado em API
       if (!$documento = Documento::find($id)) {
           return redirect()->route('documentos.index')->with('message', 'Documento não encontrado');
       }
       return view('documentos.edit', compact('documento'));
   }
   public function update(UpdateDocumentoRequest $request, string $id)
   {
        //dd('Atualizando ...');
        if (!$documento = Documento::find($id)) {
            return back()->with('message', 'Documento não encontrado');
        }
        $data = $request->only('nome_documento');
        //*************************************************************************************** */
        //Caso exista um campo requerido que só deva ser atualizado caso seja informado algum valor
        //if ($request->password) {
        //    $data['password'] = bcrypt($request->password);
        //}
        //$documento->update($request->only([
        //    'nome_documento',
        //]));
        //**************************************************************************************** */
        $documento->update($data);

        return redirect()
            ->route('documentos.index')
            ->with('success', 'Documento atualizado com sucesso');
    }

   public function show(string $id)
   {
       //$documento = Documento::find($id);
       if (!$documento = Documento::find($id)) {
           return redirect()->route('documentos.index')->with('message', 'Documento não encontrado');
       }
       return view('documentos.show', compact('documento'));
   }

   public function destroy(string $id)
   {
       $documento = Documento::find($id);
       if (!$documento = Documento::find($id)) {
           return redirect()->route('documentos.index')->with('message', 'Documento não encontrado');
       }
       $documento->delete();
       
       return redirect()
           ->route('documentos.index')
           ->with('success', 'Documento excluido com sucesso');
   }
}
