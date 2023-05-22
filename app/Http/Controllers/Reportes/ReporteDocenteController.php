<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Models\AlumnosCarrera;
use App\Models\Usuario;
use App\Models\TipoDeUsuario;
use App\Http\Requests\Usuarios\Docentes\DocenteModRequest;
use App\Http\Controllers\Controller;


class ReporteDocenteController extends Controller 
{
      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
     
 //---------------------------start function reportesdocentes-------------------------------------------
 public function index(Request $request)
 {
      $usuarios = Usuario::all();
      $tipodeusuarios = TipoDeUsuario::all();
      $docentes = Usuario::orderBy('nombre', 'asc')
      ->where('nombre', 'LIKE', "%$request->q%")
      ->where('idtu', '=', 2)
      ->paginate(($request->paginate) ? $request->paginate : 10 );
      return view("Reportes/Docentes.index")
       ->with(['tipodeusuarios' => $tipodeusuarios])
       ->with(['usuarios' => $usuarios])
       ->with(['docentes' => $docentes]);
 } 
 //---------------------------end function reportesdocentes------------------------------------------


  /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    
//---------------------------start function edit Docente-------------------------------------------
public function edit(Usuario $usuario)
{
    $usuario_id = $usuario->id;

    $alumnos = AlumnosCarrera::all();
    $tipodeusuario = TipoDeUsuario::all();

    return view('Reportes/Docentes.edit')
        ->with(['usuario_id' => $usuario_id])
        ->with(['usuario' => $usuario])
        ->with(['alumnos' => $alumnos])
        ->with(['tipodeusuario' => $tipodeusuario]);
}
  //---------------------------end function edit Docente-------------------------------------------


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
       //---------------------------start function update Docente-------------------------------------------
    public function update(DocenteModRequest $request, Usuario $usuario)
    {
       //-------------------------start encryptar password
        if($request->password){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->update($request->except('password'));
       //------------------------end encryptar password
   


        return redirect()->route('reportedocentes.index')->with('message', 'Registro actualizado exitosamente');
    }
      //---------------------------end function update Docente-------------------------------------------

//---------------------------start toggleStatus Docente -------------------------------------------
public function toggleStatus(Request $request, Usuario $usuario)
{
    $usuario->update($request->only('activo'));

    if($usuario->activo==1){
    return redirect()->route('reportedocentes.index')->with('message', 'Registro activado exitosamente');
    }
    else{
        return redirect()->route('reportedocentes.index')->with('message', 'Registro desactivado exitosamente');
    }
    
}
  //---------------------------end function toggleStatus Docente-------------------------------------------


  //---------------------------start function destroy Docente------------------------------------------
  public function destroy(Usuario $usuario)
  {
      
      $usuario->forceDelete();
      return redirect()->route('reportedocentes.index')->with('message',"Registro eliminado exitosamente");
      
      }
      //---------------------------end function destroy Docente-------------------------------------------

      

      
}
