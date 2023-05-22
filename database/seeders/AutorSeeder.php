<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
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
            'nombre_a'             => 'Rainbow Rowell',
            'nacionalidad_a'       => 'Burgues',
            'fecha_n'              => '1974-02-24',
            'fecha_d'              => '1994-04-02',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'nombre_a'             => 'John Green',
            'nacionalidad_a'       => 'Estadounidense',
            'fecha_n'              => '1977-08-24',
            'fecha_d'              => '2022-01-19',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'nombre_a'             => 'Giovanni Boccaccio',
            'nacionalidad_a'       => 'Italiano',
            'fecha_n'              => '1913-06-16',
            'fecha_d'              => '1984-07-21',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'nombre_a'             => 'Juan Rulfo',
            'nacionalidad_a'       => 'Mexicana',
            'fecha_n'              => '2000-12-20',
            'fecha_d'              => '2022-05-17',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        [
            'nombre_a'             => 'Pedro Paramo',
            'nacionalidad_a'       => 'Inglesa',
            'fecha_n'              => '1999-11-08',
            'fecha_d'              => '2018-02-24',
            'created_at'           => '2023-01-02 18:19:52',
            'updated_at'           => '2023-01-02 18:19:52'
        ],
        
        
        ];
        DB::table('autors')->insert($data);
    }
}
