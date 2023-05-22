<?php

namespace App\Exports;

use App\Models\Usuario;
use App\Models\Grupo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelAlumnoExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : view
    {
        $grupos = Grupo::all();
        $alumnos = Usuario::orderBy('idg', 'asc', 'nombre', 'asc')
        ->where('idtu', '=', 3)->get(); 

        return view('Usuarios.Alumnos.exceldownload' , ['alumnos' => $alumnos , 'grupos' => $grupos]);
    }
}
