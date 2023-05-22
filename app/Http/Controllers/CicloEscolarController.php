<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use App\Models\Grupo;
use App\Models\AlumnosCarrera;
use App\Http\Requests\Ciclos\CicloEscolarEditRequest;
use App\Http\Requests\Ciclos\RequestCicloEscolar;
use Illuminate\Http\Request;

class CicloEscolarController extends Controller
{
    public function index(Request $request)
    {
        $ciclos = CicloEscolar::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")->paginate(($request->paginate) ? $request->paginate : 10 );
        return view("Ciclos.index")
        ->with(['ciclos' => $ciclos]);
    }

    public function create()
    {
        return view('Ciclos.create');
    }

    public function store(RequestCicloEscolar $request)
    {
        CicloEscolar::create($request->all());
        return redirect()->route('ciclos.index')->with('message', 'Registro creado exitosamente');
    }

    public function edit(CicloEscolar $ciclo)
    {
        return view('Ciclos.edit', compact('ciclo'));
    }

    public function update(CicloEscolarEditRequest $request, CicloEscolar $ciclo)
    {
        $ciclo->update($request->all());
        return redirect()->route('ciclos.index')->with('message', 'Registro actualizado exitosamente');
    }

    public function destroy(CicloEscolar $ciclo)
    {
        $buscacicloescolar =AlumnosCarrera::where('idce',$ciclo->idce)->get();
        $cuantos = count($buscacicloescolar);
        if($cuantos==0)
        {
        $ciclo->forceDelete();
        return redirect()->route('ciclos.index')->with('message',"Registro eliminado exitosamente");
    }
    else{
        return redirect()->route('ciclos.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Alumnos Carreras");
    }
 }

    public function toggleStatus(Request $request, CicloEscolar $ciclo)
    {
        $ciclo->update($request->only('activo'));
        if($ciclo->activo==1){
        return redirect()->route('ciclos.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('ciclos.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
