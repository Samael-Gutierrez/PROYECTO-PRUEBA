<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;

use PDF;

use App\Models\Usuario;

class PDFDocenteController extends Controller
{
    public function downloadPDF(){
        $docentes = Usuario::orderBy('nombre', 'asc')
        ->where('idtu', '=', 2)->get();

        $pdf = PDF::loadView('Usuarios.Docentes.pdfdownload', ['docentes' => $docentes]);

        return $pdf->download('docentes.pdf');
    }
}
