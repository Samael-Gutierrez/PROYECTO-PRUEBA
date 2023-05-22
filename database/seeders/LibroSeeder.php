<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
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
            'titulo'          => 'Java Dumbs',
            'subtitulo'       => 'Programing',
            'lugar_p'         => 'Francia',
            'año_p'           => '1946',
            'edicion'         => '2da',
            'paginacion'      => 'xxi, 632 p. : ill., charts',
            'isbn'            => '978-0-13-706270-6',
            'notas'           => 'Includes bibliographical references and index',
            'titulo_v'        => 'Java',
            'serie'           => 'A455S',
            'idca'            => '1',
            'id_e'            => '1',
            'id_t'            => '1',
            'id_a'            => '1',
            'ubicacion'       => 'Biblioteca',
            'clasificacion'   => 'TP248.3/S5.8/2017',
            'status'          => 'Disponible',
            'created_at'      => '2023-01-02 18:19:52',
            'updated_at'      => '2023-01-02 18:19:52'
        ],
        
        [
            'titulo'          => 'Trenes del futuro',
            'subtitulo'       => 'Hacia adelante',
            'lugar_p'         => 'México',
            'año_p'           => '2010',
            'edicion'         => '1ra',
            'paginacion'      => 'liv, 930 p. : ill',
            'isbn'            => '978-1-58720-579-8',
            'notas'           => 'Includes index.',
            'titulo_v'        => 'Trenes magnéticos',
            'serie'           => 'C784X',
            'idca'            => '3',
            'id_e'            => '3',
            'id_t'            => '3',
            'id_a'            => '2',
            'ubicacion'       => 'Laboratorio logística',
            'clasificacion'   => 'TK5105.5487/O3.6/2017',
            'status'          => 'Prestado',
            'created_at'      => '2023-01-02 18:19:52',
            'updated_at'      => '2023-01-02 18:19:52'
        ],
        
        [
            'titulo'          => 'Business intelligence',
            'subtitulo'       => 'For all poeple',
            'lugar_p'         => 'Estados Unidos',
            'año_p'           => '2019',
            'edicion'         => '3ra',
            'paginacion'      => 'xiv, 310 p',
            'isbn'            => '9781292083797 ',
            'notas'           => 'Includes bibliographical references and index',
            'titulo_v'        => 'Money easy',
            'serie'           => 'D253F',
            'idca'            => '4',
            'id_e'            => '4',
            'id_t'            => '2',
            'id_a'            => '4',
            'ubicacion'       => 'Biblioteca',
            'clasificacion'   => 'HD38.5/C4.6/2016',
            'status'          => 'Disponible',
            'created_at'      => '2023-01-02 18:19:52',
            'updated_at'      => '2023-01-02 18:19:52'
        ],
        
        [
            'titulo'          => 'Crossfit fácil',
            'subtitulo'       => 'Yo pude!',
            'lugar_p'         => 'México',
            'año_p'           => '2022',
            'edicion'         => '1ra',
            'paginacion'      => 'xiv, 120 p. : ill., numbers',
            'isbn'            => '978-3-14220-579-4',
            'notas'           => 'Includes images.',
            'titulo_v'        => 'Ejercicio',
            'serie'           => 'F156S',
            'idca'            => '2',
            'id_e'            => '3',
            'id_t'            => '4',
            'id_a'            => '3',
            'ubicacion'       => 'Laboratorio TIC',
            'clasificacion'   => 'LO38.5/C4.6/2022',
            'status'          => 'Disponible',
            'created_at'      => '2023-01-02 18:19:52',
            'updated_at'      => '2023-01-02 18:19:52'
        ],
        
        [
            'titulo'          => 'Células buenas',
            'subtitulo'       => 'No todo es malo',
            'lugar_p'         => 'Brasil',
            'año_p'           => '2012',
            'edicion'         => '1ra',
            'paginacion'      => 'xxi, 154 p.',
            'isbn'            => '978-3-41820-154-9',
            'notas'           => 'Include stickers',
            'titulo_v'        => 'Viaje al microscopio',
            'serie'           => 'L956F',
            'idca'            => '2',
            'id_e'            => '2',
            'id_t'            => '5',
            'id_a'            => '5',
            'ubicacion'       => 'Laboratorio BIO',
            'clasificacion'   => 'CL7105.5487/P7.6/2012',
            'status'          => 'Disponible',
            'created_at'      => '2023-01-02 18:19:52',
            'updated_at'      => '2023-01-02 18:19:52'
        ],
        
        ];
        DB::table('libros')->insert($data);
    }
}
