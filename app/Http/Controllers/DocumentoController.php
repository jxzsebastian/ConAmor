<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol = Auth::user()->rol_id;
        $documentos=Documento::paginate(5);
        return view('documentos.index', compact('documentos' , 'rol'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user()->id;
        return view('documentos.crear', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'nombre'=>'required',
            'documento'=>'required|mimes:pdf,txt,docx,xls,jgp,webp|max:2028',
            'user_id'=>'required'
        ]);

        $documento = request()->except('_token');

        if ($doc = $request->file('documento')) {
            $rutaGuardarDocumento = "documentos_subidos/";
            $docGuardado = date('YmdHis'). "." . $doc->getClientOriginalExtension();
            $doc->move($rutaGuardarDocumento, $docGuardado);

            $documento['documento'] = $docGuardado;
        }
        Documento::insert($documento);
        return redirect()->route('documentos.index')->with('creado','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $documento = Documento::find($id);

        return view('documentos.editar', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $documento = request()->except('_token', '_method');

        if ($doc = $request->file('documento')) {
            $rutaGuardarDocumento = "documentos_subidos/";
            $docGuardado = date('YmdHis'). "." . $doc->getClientOriginalExtension();
            $doc->move($rutaGuardarDocumento, $docGuardado);

            $documento['documento'] = $docGuardado;
        }else {
            unset($documento['documento']);
        }

        Documento::where('id_documento', '=', $id)->update($documento);

        return redirect()->route('documentos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
        $documento->delete();
        return redirect()->route('documentos.index')->with('eliminado','ok');
    }
}
