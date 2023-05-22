<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\TipoDeUsuario;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use App\Models\CicloEscolar;
use App\Models\Grupo;
use App\Http\Requests\Usuarios\Alumnos\AlumnoRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Usuarios\Alumnos\AlumnoModRequest;
use App\Exports\EjemploUsuarioExport;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //---------------------------start function index alumno-------------------------------------------
    public function index(Request $request)
    {
        $grupos = Grupo::all();
        $carreras = Carrera::all();
        $tipodeusuarios = TipoDeUsuario::all();
        $operativos = Usuario::orderBy('nombre', 'asc')
        ->where('nombre', 'LIKE', "%$request->q%")
        ->orwhere('apellido_paterno', 'LIKE', "%$request->q%")
        ->orwhere('apellido_materno', 'LIKE', "%$request->q%")
        ->orwhere('matricula', 'LIKE', "%$request->q%")
        ->where('idtu', '=', 3)
        ->paginate(($request->paginate) ? $request->paginate : 10 );
       
        $tipodeusuarios = TipoDeUsuario::all();
        $user = Usuario::all();
        
        return view("Usuarios/Alumnos.index")
         ->with(['grupos' => $grupos])
         ->with(['carreras' => $carreras])
         ->with(['tipodeusuarios' => $tipodeusuarios])
         ->with(['user' => $user])
         ->with(['operativos' => $operativos]);
    }
    //---------------------------end function index alumno-------------------------------------------

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //---------------------------start function create alumno-------------------------------------------
    public function create()
    {
        $grupos = Grupo::all();
        $cuatrimestres = Cuatrimestre::all();
        $carreras = Carrera::all();
        $ciclos = CicloEscolar::all();

        return view('Usuarios/Alumnos.create', [
            'usuarios' => TipoDeUsuario::orderBy('nombre', 'asc')->get()
        ])
        ->with(['grupos' => $grupos])
        ->with(['cuatrimestres' => $cuatrimestres])
        ->with(['carreras' => $carreras])
        ->with(['ciclos' => $ciclos]);
    }
      //---------------------------end function create alumno-------------------------------------------

     
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function store alumno-------------------------------------------
    public function store(AlumnoRequest $request)
    {
        $foto2 = "shadow.jpg";
        Usuario::create($request->all());

        // $data = Usuario::latest('idu')->first();

        // $id   = $data->idu;

        // AlumnosCarrera::create([
        //         'idu'  => $id,
        //         'idce' => $request->idce,
        //         'idg'  => $data->idg
        //     ]);

        //-------------------------start encryptar password
        $buscapassword = Usuario::latest('password')->first();
        if($request->password){
            $buscapassword->password = bcrypt($request->password);
            $buscapassword->foto = ($foto2);
        }
        $buscapassword->update($request->except('password'));
        //-------------------------end encryptar password
 
        return redirect()->route('alumnos.index')
        ->with('message', 'Registro creado exitosamente');
    }
      //--------------------------end function store alumno-------------------------------------------

     

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
      //---------------------------start function edit Alumno-------------------------------------------
    public function edit(Usuario $usuario)
    {
        $grupos  = Grupo::all();
        // $alumnos = AlumnosCarrera::all();
        $ciclos  = CicloEscolar::all();

        $usuario_id = $usuario->idu;

        // $consulta      = AlumnosCarrera::where('idu','=',$usuario_id)->get();
        
        $consultaciclo = CicloEscolar::where('idce','=',$usuario->idce)->get();
        
        return view('Usuarios/Alumnos.edit')
            ->with(['usuario'       => $usuario])
            ->with(['grupos'        => $grupos])
            ->with(['ciclos'        => $ciclos])
            ->with(['usuario_id'    => $usuario_id])
            ->with(['consultaciclo' => $consultaciclo]);
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
            // $alumnoscarrera = AlumnosCarrera::where('idu', $usuario->idu); 
            // $alumnoscarrera->idce = $request->idce; 
            // $alumnoscarrera->idg = $request->idg;
            // $alumnoscarrera->activo = $request->activo; 

            // $alumnoscarrera->update($request->only('idce','idg','activo'));

       //-------------------------start encryptar password
        if($request->password){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->update($request->except('password'));
       //------------------------end encryptar password

        return redirect()->route('alumnos.index')->with('message', 'Registro actualizado exitosamente');
    }
      //---------------------------end function update Alumno-------------------------------------------


     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
      //---------------------------start function destroy Alumno-------------------------------------------
    public function destroy(Usuario $usuario)
    {
        // $alumnoscarrera = AlumnosCarrera::where('idu', $usuario->idu);

        // $alumnoscarrera->forceDelete();
        $usuario->forceDelete();
        
        return redirect()->route('alumnos.index')->with('message',"Registro eliminado exitosamente");
        
        }
        //---------------------------end function destroy Alumno------------------------------------------



        //---------------------------start toggleStatus Alumno -------------------------------------------
    public function toggleStatus(Request $request, Usuario $usuario)
    {
      
      // $alumnoscarrera = AlumnosCarrera::where('idu', $usuario->idu);
      // $alumnoscarrera->activo = $request->activo; 

      // $alumnoscarrera->update($request->only('activo'));
      $usuario->update($request->only('activo'));

    
        if($usuario->activo==1){
        return redirect()->route('alumnos.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('alumnos.index')->with('message', 'Registro desactivado exitosamente');
        }
        
        
    }
      //---------------------------end function toggleStatus Alumno-------------------------------------------


  
        //---------------------------start function exportarejemplo-------------------------------------------
    public function exportarejemplo(){
        return Excel::download(new EjemploUsuarioExport, 'alumnos.xlsx');
    }
      //---------------------------end function exportarejemplo-------------------------------------------

   

} 
