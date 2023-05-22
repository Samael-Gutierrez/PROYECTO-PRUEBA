<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\TipoDeUsuario;
use App\Models\Grupo;
use App\Models\AlumnosCarrera;
use App\Http\Requests\Usuarios\Docentes\DocenteRequest;
use App\Http\Requests\Usuarios\Docentes\DocenteModRequest;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
      //---------------------------start function indexdocente-------------------------------------------
      public function index(Request $request)
      {
          $tipodeusuarios = TipoDeUsuario::all();
          $operativos = Usuario::orderBy('nombre', 'asc')
          ->where('nombre', 'LIKE', "%$request->q%")
          ->where('idtu', '=', 2)
          ->paginate(($request->paginate) ? $request->paginate : 10 );
          return view("Usuarios/Docentes.index")
           ->with(['tipodeusuarios' => $tipodeusuarios])
           ->with(['operativos' => $operativos]);
      }
      //---------------------------end function indexdocente-------------------------------------------

      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      
 //--------------------------start function create docente-------------------------------------------
 public function create()
 {
     $grupos = Grupo::all();
   
     return view('Usuarios/Docentes.create', [
         'usuarios' => TipoDeUsuario::orderBy('nombre', 'asc')->get()
     ])
     ->with(['grupos' => $grupos]);
 }
   //---------------------------end function create docente-------------------------------------------

        //---------------------------start function store docente-------------------------------------------
    public function store(DocenteRequest $request)
    {
        $foto2 = "shadow.jpg";
        Usuario::create($request->all());
        //-------------------------start encryptar password
        $buscapassword = Usuario::latest('password')->first();
        if($request->password){
            $buscapassword->password = bcrypt($request->password);
            $buscapassword->foto = ($foto2);
        }
        $buscapassword->update($request->except('password'));
        //-------------------------end encryptar password

        return redirect()->route('docentes.index')
        ->with('message', 'Registro creado exitosamente');
    }
      //--------------------------end function store docente-------------------------------------------



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function show-------------------------------------------
    public function show(Usuario $usuario)
    {
        //
    }
      //---------------------------end function show-------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    
//---------------------------start function edit Docente-------------------------------------------
public function edit(Usuario $usuario)
{
    $usuario_id = $usuario->idu;
  
    $alumnos = AlumnosCarrera::all();
    $tipodeusuario = TipoDeUsuario::all();

    return view('Usuarios/Docentes.edit')
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
   


        return redirect()->route('docentes.index')->with('message', 'Registro actualizado exitosamente');
    }
      //---------------------------end function update Docente-------------------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
     
           //---------------------------start function destroy Docente------------------------------------------
    public function destroy(Usuario $usuario)
    {
        
        $usuario->forceDelete();
        return redirect()->route('docentes.index')->with('message',"Registro eliminado exitosamente");
        
    }
        //---------------------------end function destroy Docente-------------------------------------------


      //---------------------------start toggleStatus Docente -------------------------------------------
      public function toggleStatus(Request $request, Usuario $usuario)
    {
        $usuario->update($request->only('activo'));
    
        if($usuario->activo==1){
        return redirect()->route('docentes.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('docentes.index')->with('message', 'Registro desactivado exitosamente');
        }
        
    }
      //---------------------------end function toggleStatus Docente-------------------------------------------

     

} 
