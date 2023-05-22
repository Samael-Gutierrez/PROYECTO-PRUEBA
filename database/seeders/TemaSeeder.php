<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemaSeeder extends Seeder
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
            'nombre_t'     => 'Programación',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre_t'     => 'Matemáticas',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre_t'     => 'Universo',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre_t'     => 'Negocios',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre_t'     => 'Historia',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre_t'     => 'Entrenamiento',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('temas')->insert($data);
    }
}
