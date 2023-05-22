<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    
    public function run()
    {
    $data = [
        [
            'nombre'       => 'ISC-11',
            'idca'         => '1',
            'idc'          => '1',
            'identificador'=> 'ISC-1111',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ISC-12',
            'idca'         => '1',
            'idc'          => '1',
            'identificador'=> 'ISC-1211',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ISC-13',
            'idca'         => '1',
            'idc'          => '1',
            'identificador'=> 'ISC-1311',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ISC-21',
            'idca'         => '1',
            'idc'          => '2',
            'identificador'=> 'ISC-2112',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ISC-22',
            'idca'         => '1',
            'idc'          => '2',
            'identificador'=> 'ISC-2212',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ISC-23',
            'idca'         => '1',
            'idc'          => '2',
            'identificador'=> 'ISC-2312',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'IB-71',
            'idca'         => '2',
            'idc'          => '7',
            'identificador'=> 'IB-7127',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'IB-72',
            'idca'         => '2',
            'idc'          => '7',
            'identificador'=> 'IB-7227',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'IB-73',
            'idca'         => '2',
            'idc'          => '7',
            'identificador'=> 'IB-7327',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ILT-61',
            'idca'         => '3',
            'idc'          => '6',
            'identificador'=> 'ILT-6136',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ILT-62',
            'idca'         => '3',
            'idc'          => '6',
            'identificador'=> 'ILT-6236',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        [
            'nombre'       => 'ILT-63',
            'idca'         => '3',
            'idc'          => '6',
            'identificador'=> 'ILT-6336',
            'created_at'   => '2023-01-02 18:19:52',
            'updated_at'   => '2023-01-02 18:19:52'
        ],
        
        
        ];
        DB::table('grupos')->insert($data);
    }
}
