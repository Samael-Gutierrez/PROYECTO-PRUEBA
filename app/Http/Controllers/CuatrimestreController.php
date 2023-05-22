<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cuatrimestres\CuatrimestreEditRequest;
use App\Http\Requests\Cuatrimestres\RequestCuatrimestre;
use App\Models\Cuatrimestre;
use App\Models\Grupo;
use Illuminate\Http\Request;

class CuatrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cuatrimestres = Cuatrimestre::orderBy('idc', 'asc')->where('nombre', 'LIKE', "%$request->q%")->paginate(($request->paginate) ? $request->paginate : 10 );

        return view("Cuatrimestres.index")
        ->with(['cuatrimestres' => $cuatrimestres]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cuatrimestres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCuatrimestre $request)
    {

         Cuatrimestre::create($request->all());

        return redirect()->route('cuatrimestres.index')->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function show(Cuatrimestre $cuatrimestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuatrimestre $cuatrimestre)
    {
        return view('Cuatrimestres.edit', compact('cuatrimestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function update(CuatrimestreEditRequest $request, Cuatrimestre $cuatrimestre)
    {
        $cuatrimestre->update($request->all());

        return redirect()->route('cuatrimestres.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuatrimestre $cuatrimestre)
    {
        $buscacuatrimestre =Grupo::where('idc',$cuatrimestre->idc)->get();
        $cuantos = count($buscacuatrimestre);
        if($cuantos==0)
        {
        $cuatrimestre->forceDelete();
        return redirect()->route('cuatrimestres.index')->with('message',"Registro eliminado exitosamente");
        }

        else
        {
            return redirect()->route('cuatrimestres.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Grupos");
        }

    }

    public function toggleStatus(Request $request, Cuatrimestre $cuatrimestre)
    {
        $cuatrimestre->update($request->only('activo'));
        if($cuatrimestre->activo==1){
        return redirect()->route('cuatrimestres.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('cuatrimestres.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
