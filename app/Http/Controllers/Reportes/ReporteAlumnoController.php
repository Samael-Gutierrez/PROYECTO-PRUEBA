<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Models\AlumnosCarrera;
use App\Models\Grupo;
use App\Models\Usuario;
use App\Models\CicloEscolar;
use App\Models\TipoDeUsuario;
use App\Http\Requests\Usuarios\Alumnos\AlumnoModRequest;
use App\Http\Controllers\Controller;

class ReporteAlumnoController extends Controller 
{
     //------------------consulta01----------------------------------------
    public function consulta01(Request $request){
        $gru=0;
        $grupos = Grupo::all(); 
        $alumnocarreras = AlumnosCarrera::all();
        $alumnos = $alumnos = Usuario::orderBy('nombre', 'asc')
        ->where('nombre', 'LIKE', "%$request->q%")
        ->where('idtu', '=', 3)
        ->where('idg', '=', $gru)
        ->paginate(($request->paginate) ? $request->paginate : 10 );
        

        return view ("Reportes/Alumnos.consulta01")
        ->with(['grupos' => $grupos])
        ->with(['gru' => $gru])
        ->with(['alumnocarreras' => $alumnocarreras])
        ->with(['alumnos' => $alumnos]);
    }
    //----------------endconsulta01---------------------------------------


   //--------------------------start datos1---------------------------------
    public function datos1(Request $request){
        $grupos = Grupo::all();
        $id = $request->get('id');
        $alumnos = Usuario::orderBy('nombre', 'asc')->where('idg',$id)->paginate(($request->paginate) ? $request->paginate : 10);
        return view("Reportes/Alumnos/datos01")
        ->with(['alumnos' => $alumnos])
        ->with(['grupos' => $grupos]);
    }
    //--------------------------------end datos1--------------------------------

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function edit Alumno-------------------------------------------
    public function edit(Usuario $usuario)
    {
    
        $grupos = Grupo::all();
        $ciclos = CicloEscolar::all();
        $usuario_id = $usuario->idu;
        $grupo_id = $usuario->idg;
        $ciclo_id = $usuario->idce;
    
        $tipodeusuario = TipoDeUsuario::all();
    
        return view('Reportes/Alumnos.edit')
            ->with(['usuario' => $usuario])
            ->with(['grupos' => $grupos])
            ->with(['ciclos' => $ciclos])
            ->with(['usuario_id' => $usuario_id])
            ->with(['grupo_id' => $grupo_id])
            ->with(['ciclo_id' => $grupo_id])
            ->with(['tipodeusuario' => $tipodeusuario]);
    }
      //---------------------------end function edit Alumno-------------------------------------------


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function update Alumno-------------------------------------------
    public function update(AlumnoModRequest $request, Usuario $usuario)
    {
       //-------------------------start encryptar password
        if($request->password){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->update($request->except('password'));
       //------------------------end encryptar password

       $grupos = Grupo::all();
       $gru=($usuario->idg);
       //dd($gru);
       $alumnos = $alumnos = Usuario::orderBy('nombre', 'asc')
       ->where('nombre', 'LIKE', "%$request->q%")
       ->where('idtu', '=', 3)
       ->where('idg', '=', $gru)
       ->paginate(($request->paginate) ? $request->paginate : 10 );

       return view ("Reportes/Alumnos.consulta01")
       ->with(['grupos' => $grupos])
       ->with(['gru' => $gru])
       ->with(['alumnos' => $alumnos])
       ->with('message', 'Registro actualizado exitosamente');

    }
      

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function destroy Alumno-------------------------------------------
      public function destroy(Usuario $usuario, Request $request)
      {
        $grupos = Grupo::all();
        $gru=($usuario->idg);
       //dd($gru);

       $usuario->forceDelete();
       $alumnos = $alumnos = Usuario::orderBy('nombre', 'asc')
       ->where('nombre', 'LIKE', "%$request->q%")
       ->where('idtu', '=', 3)
       ->where('idg', '=', $gru)
       ->paginate(($request->paginate) ? $request->paginate : 10 );

           return view ("Reportes/Alumnos.consulta01")
            ->with(['grupos' => $grupos])
            ->with(['gru' => $gru])
            ->with(['alumnos' => $alumnos])
            ->with('message', 'Registro eliminado exitosamente');
          
          }
          //---------------------------end function destroy Alumno------------------------------------------

          

      //---------------start toggleStatus Alumno -------------------------------
      public function toggleStatus(Request $request, Usuario $usuario)
      {
        $grupos = Grupo::all();
        $gru=($usuario->idg);
        //dd($gru);
        $usuario->update($request->only('activo'));
        $alumnos = $alumnos = Usuario::orderBy('nombre', 'asc')
        ->where('nombre', 'LIKE', "%$request->q%")
        ->where('idtu', '=', 3)
        ->where('idg', '=', $gru)
        ->paginate(($request->paginate) ? $request->paginate : 10 );
      
          if($usuario->activo==1){
            return view ("Reportes/Alumnos.consulta01")
            ->with(['grupos' => $grupos])
            ->with(['gru' => $gru])
            ->with(['alumnos' => $alumnos])
            ->with('message', 'Registro desactivado exitosamente');
          }
          else{
            return view ("Reportes/Alumnos.consulta01")
            ->with(['grupos' => $grupos])
            ->with(['gru' => $gru])
            ->with(['alumnos' => $alumnos])
            ->with('message', 'Registro activado exitosamente');
          }
      }
        //---------------------------end function toggleStatus Alumno-------------------------------------------

        
    
}
