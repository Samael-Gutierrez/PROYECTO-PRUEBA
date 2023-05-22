<?php

namespace App\Exports;

use App\Models\Usuario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelDocenteExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : view
    {
        $docentes = Usuario::orderBy('nombre', 'asc')
        ->where('idtu', '=', 2)->get(); 

        return view('Usuarios.Docentes.exceldownload' , ['docentes' => $docentes]);
    }
}