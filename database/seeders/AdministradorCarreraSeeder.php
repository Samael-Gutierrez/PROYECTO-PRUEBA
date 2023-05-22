<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorCarreraSeeder extends Seeder
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
            'idadmin'       => '2',
            'idca'          => '1',
            'created_at'    => '2023-01-02 18:19:52',
            'updated_at'    => '2023-01-02 18:19:52'
        ],
        [
            'idadmin'       => '3',
            'idca'          => '2',
            'created_at'    => '2023-01-02 18:19:52',
            'updated_at'    => '2023-01-02 18:19:52'
        ],
        [
            'idadmin'       => '4',
            'idca'          => '3',
            'created_at'    => '2023-01-02 18:19:52',
            'updated_at'    => '2023-01-02 18:19:52'
        ],
        
        [
            'idadmin'       => '4',
            'idca'          => '4',
            'created_at'    => '2023-01-02 18:19:52',
            'updated_at'    => '2023-01-02 18:19:52'
        ],
      
        ];
        DB::table('administrador_carrera')->insert($data);
    }
}
