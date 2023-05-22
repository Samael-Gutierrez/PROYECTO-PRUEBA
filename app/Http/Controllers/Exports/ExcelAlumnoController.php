<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\ExcelAlumnoExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelAlumnoController extends Controller
{
    public function downloadExcelAlumno(){
        return Excel::download(new ExcelAlumnoExport, 'Lista-Alumnos.xlsx');
    }
}
