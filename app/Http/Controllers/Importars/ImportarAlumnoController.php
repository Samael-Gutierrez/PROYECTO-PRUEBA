<?php

namespace App\Http\Controllers\Importars;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Grupo;
use App\Imports\UsuariosImport;
use App\Http\Controllers\Controller;
use App\Exports\EjemploUsuarioExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Importar\AlumnoImportRequest;

class ImportarAlumnoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();
        $ciclos = CicloEscolar::all();
        return view('Importar/Alumnos.import')
            ->with(['carreras' => $carreras])
            ->with(['ciclos' => $ciclos]);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoImportRequest $request)
    {
        $file = $request->file('import_file');
       if (empty($file)) 
       {   
        return redirect()->route('alumnosimport.index')->with('message', 'Ningún archivo seleccionado');
       }
       else{
         $file = $request->file('import_file');

        Excel::import(new UsuariosImport($request->resultado), $file);
          
        return redirect()->route('alumnos.index')
        ->with('message', 'Archivo subido exitosamente');
       }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     //---------------------------start function exportarejemplo-------------------------------------------
     public function exportarejemploalumnos(){
        return Excel::download(new EjemploUsuarioExport, 'UPMP_Alumnos.xlsx');
    }
      //---------------------------end function exportarejemplo-------------------------------------------


    //---------------------------start function getGrupos (Select_dinamico)-------------------------------
    public function getGrupos(Request $request)
    {
        $grupos=Grupo::whereIdca($request->carrera_id)
        ->where('activo', '=', 1)
        ->orderBy('nombre')->get();
         return  $grupos; 
    }
     //---------------------------end function getGrupos (Select_dinamico)---------------------------------
    
}
