<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\TipoDeUsuarioEditRequest;
use App\Http\Requests\Roles\RequestTipoDeUsuario;
use App\Models\TipoDeUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TipoDeUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipodeusuarios = TipoDeUsuario::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")->paginate(($request->paginate) ? $request->paginate : 10 );

        return view("Tipo_de_Usuarios.index")
        ->with(['tipodeusuarios' => $tipodeusuarios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipo_de_Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTipoDeUsuario $request)
    {

        TipoDeUsuario::create($request->all());

        return redirect()->route('tipodeusuarios.index')->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeUsuario  $tipodeusuario
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeUsuario $tipodeusuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeUsuario  $tipodeusuario
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDeUsuario $tipodeusuario)
    {
        return view('Tipo_de_Usuarios.edit', compact('tipodeusuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDeUsuario  $tipodeusuario
     * @return \Illuminate\Http\Response
     */
    public function update(TipoDeUsuarioEditRequest $request, TipoDeUsuario $tipodeusuario)
    {
        $tipodeusuario->update($request->all());

        return redirect()->route('tipodeusuarios.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeUsuario  $tipodeusuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDeUsuario $tipodeusuario)
    {
        $buscausuario =Usuario::where('idtu',$tipodeusuario->idtu)->get();
        $cuantos = count($buscausuario);
        if($cuantos==0)
        {
        $tipodeusuario->forceDelete();
        return redirect()->route('tipodeusuarios.index')->with('message',"Registro eliminado exitosamente");
        }
        else{
            return redirect()->route('tipodeusuarios.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Usuarios");
        }
    }

    public function toggleStatus(Request $request, TipoDeUsuario $tipodeusuario)
    {
        $tipodeusuario->update($request->only('activo'));
        if($tipodeusuario->activo==1){
        return redirect()->route('tipodeusuarios.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('tipodeusuarios.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
