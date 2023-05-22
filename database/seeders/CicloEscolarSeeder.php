<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CicloEscolarSeeder extends Seeder
{

    public function run()
    {
       $data = [
        [
            'nombre'       => 'enero-abril 2022',
            'activo'       => '0',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'mayo-agosto 2022',
            'activo'       => '0',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'septiembre-diciembre 2022',
            'activo'       => '0',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'enero-abril 2023',
            'activo'       => '1',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('ciclo_escolars')->insert($data);
    }
}
