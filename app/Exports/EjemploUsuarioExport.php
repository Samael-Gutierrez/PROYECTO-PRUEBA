<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class EjemploUsuarioExport implements FromView, ShouldAutoSize
{
    public function view() : View
    {
        return view('Exportar.ejemploUO'); 
    }
}