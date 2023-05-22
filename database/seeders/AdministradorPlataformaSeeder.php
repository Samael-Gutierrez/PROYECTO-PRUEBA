<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdministradorPlataforma;
use Illuminate\Support\Facades\Hash;

class AdministradorPlataformaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Ing.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Clara',
        'apellido_paterno'   => 'Salazar',
        'apellido_materno'   => 'Flores',
        'email'              => 'administrador@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '7',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Lic.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Joel',
        'apellido_paterno'   => 'Garduño',
        'apellido_materno'   => 'Gutierrez',
        'email'              => 'directivo@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '6',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Ing.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Joel',
        'apellido_paterno'   => 'Gutierrez',
        'apellido_materno'   => 'Nuñes',
        'email'              => 'academico@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '5',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Ing.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Fernando',
        'apellido_paterno'   => 'Gomez',
        'apellido_materno'   => 'Gonzáles',
        'email'              => 'tutorias@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '4',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Ing.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Jesus',
        'apellido_paterno'   => 'Gutierrez',
        'apellido_materno'   => 'Flores',
        'email'              => 'vinculacion@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '3',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Lic.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Vianey',
        'apellido_paterno'   => 'Guadarrama',
        'apellido_materno'   => 'Juarez',
        'email'              => 'control@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '2',
        ]);

        $admin=AdministradorPlataforma::create([
        'Titulo'             => 'Lic.',
        'foto'               => 'shadow.jpg',
        'nombre'             => 'Lucia',
        'apellido_paterno'   => 'Hernandez',
        'apellido_materno'   => 'Peralta',
        'email'              => 'biblioteca@gmail.com',
        'password'           =>  Hash::make('password'),
        'ida'                => '1',
        ]);
       
    }
}
