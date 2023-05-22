<?php
namespace App\Http\Controllers;
use App\Http\Requests\Grupos\GrupoEditRequest;
use App\Http\Requests\Grupos\RequestGrupo;
use App\Models\Grupo;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use App\Models\CicloEscolar;
use App\Models\AdministradorCarrera;
use Illuminate\Http\Request;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carreras = Carrera::all();
        $admin_carreras = AdministradorCarrera::all();
        $admin_id = auth()->user()->idadmin;
        //dd($admin_id);
        $admin_area_id = auth()->user()->ida;
        //dd($admin_area_id);
        $grupos = Grupo::orderBy('nombre', 'asc')
        ->where('nombre', 'LIKE', "%$request->q%")
        ->paginate(($request->paginate) ? $request->paginate : 10 );
        return view("Grupos.index")
        ->with(['admin_id' => $admin_id])
        ->with(['admin_area_id' => $admin_area_id])
        ->with(['admin_carreras' => $admin_carreras])
        ->with(['grupos' => $grupos])
        ->with(['carreras' => $carreras]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
        return view('Grupos.create')
            ->with(['carreras' => $carreras])
            ->with(['cuatrimestres' => $cuatrimestres]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestGrupo $request)
    {
        
        Grupo::create($request->all());
        return redirect()->route('grupos.index')->with('message', 'Registro creado exitosamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        $carreras = Carrera::all();
        $grupos = Grupo::all();
        $cuatrimestres = Cuatrimestre::all();
        return view('Grupos.edit', compact('grupo'))
        ->with(['carreras' => $carreras])
        ->with(['grupos' => $grupos])
        ->with(['cuatrimestres' => $cuatrimestres]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuatrimestre  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoEditRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());
        return redirect()->route('grupos.index')->with('message', 'Registro actualizado exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $cuatrimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $buscausuario =Usuario::where('idg',$grupo->idg)->get();
        $cuantos = count($buscausuario);
        if($cuantos==0)
        {
            $grupo->forceDelete();
            return redirect()->route('grupos.index')->with('message',"Registro eliminado exitosamente");
        }
        else{
            return redirect()->route('grupos.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Usuarios");
        }
         }
    public function toggleStatus(Request $request, Grupo $grupo)
    {
        $grupo->update($request->only('activo'));
        if($grupo->activo==1){
        return redirect()->route('grupos.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('grupos.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

    public function movimientoEntreGruposIndex(Request $request){
        
        $grupos_disponibles = Grupo::latest()->where('activo', 1)->get();
        if($request->idg){
           
            $grupo_seleccionado = Grupo::find($request->idg);
            $alumnos = Grupo::find($request->idg)
                        ->alumnos()
                        ->orderBy('apellido_paterno', 'asc')
                        ->orderBy('apellido_materno', 'asc')
                        ->get();

            
            return view('Herramientas.MovimientoEntreGrupos.index', [
                'grupos_disponibles' => $grupos_disponibles,
                'alumnos' => $alumnos,
                
                'grupo_seleccionado' => $grupo_seleccionado
            ]);
        }

        
        return view('Herramientas.MovimientoEntreGrupos.index', [
            'grupos_disponibles' => $grupos_disponibles,
        ]);
    }


    public function prueba(Grupo $grupo){
        $grupos = Grupo::where('idca', $grupo->idca)->get();
        $alumnos = Grupo::find($grupo->id)->alumnos()->where('activo', 1);
        return view('Herramientas.MovimientoEntreGrupos.individual')->with([
            'grupos' => $grupos,
            'alumnos' => $alumnos,
            'grupoSeleccionado' => $grupo
        ]);
    }

    public function hacerMovimientoGrupal(Grupo $grupo){

        $grupos_disponibles = Grupo::where('idca', $grupo->idca)
            ->where('activo', 1)
            ->where('idg', '<>', $grupo->idg)
            ->latest()
            ->get();

        $alumnos = Grupo::find($grupo->idg)->alumnos;

        return view('Herramientas.MovimientoEntreGrupos.grupal', compact('grupo', 'grupos_disponibles', 'alumnos'));
    }

    public function moverGrupo(Request $request, Grupo $grupo){
        try{
            $alumnos = Grupo::find($grupo->idg)->alumnos;
            foreach($alumnos as $alumno){
                $alumno->idg = $request->grupo_nuevo;
                $alumno->save();
            }
            return redirect()->route('mover.entre.grupos.index')->with('message', 'Se movió correctamente a los alumnos a su nuevo grupo');

        }catch(\Throwable $th){
            return redirect()->route('mover.entre.grupos.index')->with('error', 'Ocurrio un error al intentar mover a los alumnos, contacta a un administrador');
        }
    }

    public function hacerMovimientoIndividual(Grupo $grupo){

           $grupos_disponibles = Grupo::where('idca', $grupo->idca)
            ->where('activo', 1)
            ->where('idg', '<>', $grupo->idg)
            ->latest()
            ->get();

            $grupos_seleccionado = Grupo::where('idca', $grupo->idca)
            ->where('activo', 1)
            ->where('idg', '=', $grupo->idg)
            ->latest()
            ->get();

            $carreras_seleccionado = Carrera::where('idca', $grupo->idca)
            ->where('activo', 1)
            ->where('idca', '=', $grupo->idca)
            ->latest()
            ->get();

        $alumnos = Grupo::find($grupo->idg)->alumnos;

        return view('Herramientas.MovimientoEntreGrupos.individual', compact('grupo', 
        'grupos_disponibles', 'alumnos', 'grupos_seleccionado', 'carreras_seleccionado'));
    }


    public function moverIndividual(Request $request){

        foreach ($request->get('grupo') as $key => $value) {
            $asistencia = Usuario::find($request->get('idGrupo')[$key]);
            $asistencia->idg = $value;
            $asistencia->update();
        }
            return redirect()->route('mover.entre.grupos.index')->with('message', 'Se movieron exitosamente los alumnos a su nuevo grupo');

        
    }

}