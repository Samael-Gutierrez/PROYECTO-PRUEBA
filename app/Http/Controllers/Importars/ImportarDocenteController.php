<?php

namespace App\Http\Controllers\Importars;

use Illuminate\Http\Request;
use App\Exports\EjemploDocenteExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DocentesImport;

use App\Http\Controllers\Controller;

class ImportarDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Importar/Docentes.import');
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
    public function store(Request $request)
    {
        $file = $request->file('import_file');
       if (empty($file)) 
       {
        return redirect()->route('docentesimport.index')->with('message', 'Ningún archivo seleccionado');
       }
       else{
        
        Excel::import(new DocentesImport, $file);
        return redirect()->route('docentes.index')->with('message', 'Archivo subido exitosamente');
        

    
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
     public function exportarejemplodocentes(){
        return Excel::download(new EjemploDocenteExport, 'UPMP_Docentes.xlsx');
    }
      //---------------------------end function exportarejemplo-------------------------------------------

}
