<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Models\AdministradorCarrera;
use App\Models\AdministradorPlataforma;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Fotos\AdministradorPlataformaFotoRequest;
use App\Http\Requests\Passwords\AdministradorPlataformaPasswordRequest;
use App\Http\Requests\AdministradoresPlataforma\AdministradorPlataformaRequest;
use App\Http\Requests\AdministradoresPlataforma\AdministradorPlataformaEditRequest;
use Auth;

class AdministradorPlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('AdministradoresPlataforma.index',[
            'administradores' => AdministradorPlataforma::orderBy('nombre', 'asc')
            ->where('nombre', 'LIKE', "%$request->q%")
            ->orwhere('apellido_paterno', 'LIKE', "%$request->q%")
            ->orwhere('apellido_materno', 'LIKE', "%$request->q%")
            ->paginate(($request->paginate) ? $request->paginate : 10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $areas = Area::all();
        $carreras = Carrera::all();
        return view('AdministradoresPlataforma.create')
        ->with(['areas' => $areas])
        ->with(['carreras' => $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdministradorPlataformaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorPlataformaRequest $request)
    {
        $foto2 = "shadow.jpg";

        $nuevoAdmin = new AdministradorPlataforma($request->except('carreras', 'password'));
        $nuevoAdmin->password = bcrypt($request->password);
        $nuevoAdmin->foto = ($foto2);
        $nuevoAdmin->save();

        foreach($request->carreras as $carrera){
            AdministradorCarrera::create([
                'idadmin' => $nuevoAdmin->idadmin,
                'idca' => $carrera
            ]);
        }
        return redirect()->route('administradores.index')
        ->with('message', 'Registro creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdministradorPlataforma  $administradorPlataforma
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministradorPlataforma $administradorPlataforma)
    {
        $areas = Area::where('activo', 1)->get();
        $carreras = Carrera::where('activo', 1)->get();
        $carrerasAdmin = AdministradorCarrera::where('idadmin', $administradorPlataforma->idadmin)->get();

        return view('AdministradoresPlataforma.edit', compact('administradorPlataforma'))
        ->with(['carreras' => $carreras])
        ->with(['areas' => $areas])
        ->with(['carrerasAdmin' => $carrerasAdmin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AdministradorPlataformaRequest  $request
     * @param  \App\Models\AdministradorPlataforma  $administradorPlataforma
     * @return \Illuminate\Http\Response
     */
    public function update(AdministradorPlataformaEditRequest $request, AdministradorPlataforma $administradorPlataforma)
    {
        if($request->password){
            $administradorPlataforma->password = bcrypt($request->password);
        }

        $administradorPlataforma->update($request->except('password'));

        $carrerasAdmin = AdministradorCarrera::where('idadmin', $administradorPlataforma->idadmin)->get();

        foreach($carrerasAdmin as $carrera){
            $carrera->delete();
        }

        foreach($request->carreras as $carrera){
            AdministradorCarrera::create([
                'idadmin' => $administradorPlataforma->idadmin,
                'idca' => $carrera
            ]);
        }

        return redirect()->route('administradores.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdministradorPlataforma  $administradorPlataforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministradorPlataforma $administradorPlataforma)
    {
        if(Auth::user()->idadmin == $administradorPlataforma->idadmin){
          return redirect()->route('administradores.index')->with('error', '¡ El registro no se puede eliminar ya que usted se encuentra logeado con está cuenta !');
        }else{
        $administradorcarrera = AdministradorCarrera::where('idadmin', $administradorPlataforma->idadmin);

        $administradorcarrera->forceDelete();
        $administradorPlataforma->forceDelete();
        return redirect()->route('administradores.index')->with('message',"Registro eliminado exitosamente");
        }
    }

    public function toggleStatus(Request $request, AdministradorPlataforma $administradorPlataforma){

        $administradorPlataforma->update($request->only('activo'));

        if($administradorPlataforma->activo==1){
        return redirect()->route('administradores.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('administradores.index')->with('message', 'Registro desactivado exitosamente');
        }
    }

    public function updatepassword(Request $request, $id){

        $contraseña = \Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($contraseña->fails())
        {
        return back()->with('passwordincorrecto','ok');
        }

         $admin = AdministradorPlataforma::find($id);
         $admin->password = bcrypt($request->password);
         $admin->save();

        return back()->with('password','ok');
    }


    public function updatefoto(Request $request, $id){
        $foto = \Validator::make($request->all(), [
           'foto'=> ['image', 'required', 'max:2048'],
        ]);

        if ($foto->fails())
        {
           return back()->with('fotoincorrecto','ok');
        }

        $usuario = AdministradorPlataforma::find($id);
        if ($request->hasFile('foto')) {
            if (Storage::disk('local')->exists("$usuario->foto")) {
                if($usuario->foto == "shadow.jpg"){
                $usuario->foto = "shadow.jpg";
                } else {
                 Storage::disk('local')->delete("$usuario->foto");
                }
            }
            $usuario->foto = Storage::disk('local')->putFile('', $request->file('foto'));
        }
        $usuario->save();

            $admin = AdministradorPlataforma::find($id);
            if(Storage::disk('local')->exists("$admin->foto")){
                Storage::disk('local')->delete("$admin->foto");
            }
            $admin->foto = $request->file('foto')->store('');
            $admin->save();

            return back()->with('foto','ok');
    }


    public function perfil(){
        $usuario = AdministradorPlataforma::find(Auth::id());
        return view('AdministradoresPlataforma.perfil', compact('usuario'));
    }

   
}
