<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    
    public function run()
    {
       $data = [
        [
            'nombre'       => 'Ingenieria en Sistemas Computacionales',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'Ingeniería en Biotecnología',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'Ingeniería en Lógistica y Transporte',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'Lincenciatura en Administracion de Empresas',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('carreras')->insert($data);
    }
}
