<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuatrimestre;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Grupo;
use App\Models\Area;
use App\Models\TipoDeUsuario;
use App\Models\AdministradorPlataforma;
use App\Models\AdministradorCarrera;
use App\Models\Usuario;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Tema;
use App\Models\Libro;
use App\Models\Prestamo;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call(CuatrimestreSeeder::class);
         $this->call(CarreraSeeder::class);
         $this->call(CicloEscolarSeeder::class);
         $this->call(GrupoSeeder::class);
         $this->call(AreaSeeder::class);
         $this->call(TipoUsuarioSeeder::class);
         $this->call(AdministradorPlataformaSeeder::class);
         $this->call(AdministradorCarreraSeeder::class);
         $this->call(UsuarioSeeder::class);
         $this->call(AutorSeeder::class);
         $this->call(EditorialSeeder::class);
         $this->call(TemaSeeder::class);
         $this->call(LibroSeeder::class);
         $this->call(PrestamoSeeder::class);
    }
}
