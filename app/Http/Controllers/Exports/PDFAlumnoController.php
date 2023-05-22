<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;

use PDF;

use App\Models\Usuario;
use App\Models\Grupo;

class PDFAlumnoController extends Controller
{
    public function downloadPDFAlumno(){
        $grupos = Grupo::all();
        $alumnos = Usuario::orderBy('idg', 'asc','nombre', 'asc')
        ->where('idtu', '=', 3)->get();

        $pdf = PDF::loadView('Usuarios.Alumnos.pdfdownload', ['alumnos' => $alumnos , 'grupos' => $grupos]);

        return $pdf->download('alumnos.pdf');
    }
}
