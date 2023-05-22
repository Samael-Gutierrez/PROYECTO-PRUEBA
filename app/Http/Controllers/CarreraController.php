<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\AdministradorCarrera;
use Illuminate\Http\Request;
use App\Http\Requests\Carreras\CarreraEditRequest;
use App\Http\Requests\Carreras\RequestCarrera;

class CarreraController extends Controller
{
    public function index(Request $request)
    {
        $carreras = Carrera::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")->paginate(($request->paginate) ? $request->paginate : 10 );
        return view("Carreras.index")
        ->with(['carreras' => $carreras]);
    }

    public function create()
    {
        return view('Carreras.create');
    }

    public function store(RequestCarrera $request)
    {
        Carrera::create($request->all());
        return redirect()->route('carreras.index')->with('message', 'Registro creado exitosamente');
    }

    public function edit(Carrera $carrera)
    {
        return view('Carreras.edit', compact('carrera'));
    }

    public function update(CarreraEditRequest $request, Carrera $carrera)
    {
        $carrera->update($request->all());
        return redirect()->route('carreras.index')->with('message', 'Registro actualizado exitosamente');
    }

    public function destroy(Carrera $carrera)
    {
        $buscagrupo =Grupo::where('idca',$carrera->idca)->get();
        $cuantos = count($buscagrupo);
        if($cuantos>0)
        {
            return redirect()->route('carreras.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Grupos");
   
        }
        $buscaadmin =AdministradorCarrera::where('idca',$carrera->idca)->get();
        $cuantos2 = count($buscaadmin);
        if($cuantos2>0)
        {
            return redirect()->route('carreras.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Administrador Carrera");
   
        }
    else{
        $carrera->forceDelete();
        return redirect()->route('carreras.index')->with('message',"Registro eliminado exitosamente");
    
        }
   }

    public function toggleStatus(Request $request, Carrera $carrera)
    {
        $carrera->update($request->only('activo'));
        if($carrera->activo==1){
        return redirect()->route('carreras.index')->with('message', 'Registro activado exitosamente');
        }else{
            return redirect()->route('carreras.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
