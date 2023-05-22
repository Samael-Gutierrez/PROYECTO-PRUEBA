<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario=Usuario::create([
        'matricula'          => '221910301',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Joel',
        'apellido_paterno'   => 'Gutierréz',
        'apellido_materno'   => 'Nuñez',
        'email'              => 'joel@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'M',
        'idtu'               => '3',
        'idg'                => '1',
        'idce'               => '4',
        ]);

        $usuario=Usuario::create([
        'matricula'          => '221910302',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Alfredo',
        'apellido_paterno'   => 'Heraz',
        'apellido_materno'   => 'Pérez',
        'email'              => 'alfredo@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'M',
        'idtu'               => '3',
        'idg'                => '1',
        'idce'               => '4',
        ]);

        $usuario=Usuario::create([
        'matricula'          => '221910303',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Samel',
        'apellido_paterno'   => 'Gutierréz',
        'apellido_materno'   => 'Engombia',
        'email'              => 'samael@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'M',
        'idtu'               => '3',
        'idg'                => '1',
        'idce'               => '4',
        ]);

        $usuario=Usuario::create([
        'matricula'          => '3552731',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Vinicio',
        'apellido_paterno'   => 'Camacho',
        'apellido_materno'   => 'Camacho',
        'email'              => 'vivnicio@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'M',
        'idtu'               => '2',
        ]);

        $usuario=Usuario::create([
        'matricula'          => '221910304',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Decireth',
        'apellido_paterno'   => 'Reyes',
        'apellido_materno'   => 'Reyes',
        'email'              => 'decireth@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'F',
        'idtu'               => '3',
        'idg'                => '4',
        'idce'               => '4',
        ]);

        $usuario=Usuario::create([
        'matricula'          => '3552732',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Maricela',
        'apellido_paterno'   => 'Castañeda',
        'apellido_materno'   => 'Valencía',
        'email'              => 'maricela@gmail.com',
        'password'           =>  Hash::make('password'),
        'sexo'               => 'F',
        'idtu'               => '2',
        ]);

       
    }
}
