<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        [
            'idu'              => '1',
            'fecha_p'          => '2022-09-08',
            'observacion_p'    => 'Ninguna',
            'fecha_dev'        => '2022-09-10',
            'observacion_dev'  => 'Pasta rota',
            'id_l'             => '2',
            'tipo_p'           => 'Domicilio',
            'status'           => 'Prestado',
            'created_at'       => '2023-01-02 18:19:52',
            'updated_at'       => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('prestamos')->insert($data);
    }
}
