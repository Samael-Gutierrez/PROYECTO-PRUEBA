<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\ExcelDocenteExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDocenteController extends Controller
{
    public function downloadExcelDocente(){
        return Excel::download(new ExcelDocenteExport, 'Lista-Docentes.xlsx');
    }
}