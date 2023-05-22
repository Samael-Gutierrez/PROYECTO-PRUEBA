<?php

namespace App\Http\Controllers;

use App\Http\Requests\Areas\AreaEditRequest;
use App\Http\Requests\Areas\AreaRequest;
use App\Models\Area;
use App\Models\AdministradorPlataforma;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $administradores = AdministradorPlataforma::all();
        return view('Areas.index',[
            'areas' => Area::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")->paginate( ($request->paginate) ? $request->paginate : 10 )
        ])
        ->with(['administradores' => $administradores]);
    }

    public function edit(Area $area){
        return view('Areas.edit', compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());

        return redirect()->route('areas.index')->with('message', 'Registro creado exitosamente');
    }

    public function create(){
        return view('Areas.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaEditRequest $request, Area $item)
    {
        $item->update($request->all());

        return redirect()->route('areas.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $buscaadministrador =AdministradorPlataforma::where('ida',$area->ida)->get();
        $cuantos = count($buscaadministrador);
        if($cuantos==0)
        {
        $area->forceDelete();
        return redirect()->route('areas.index')->with('message',"Registro eliminado exitosamente");
        }

        else
        {
            return redirect()->route('areas.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Administradores Plataforma");
        }
    }



    public function toggleStatus(Request $request, Area $area)
    {
        $area->update($request->only('activo'));
        if($area->activo==1){
        return redirect()->route('areas.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('areas.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

}

