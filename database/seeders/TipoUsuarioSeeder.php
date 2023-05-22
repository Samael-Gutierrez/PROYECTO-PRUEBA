<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
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
            'nombre'       => 'Administrativos',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'Docentes',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'Alumnos',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('tipo_de_usuarios')->insert($data);
    }
}
