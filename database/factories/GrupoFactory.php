<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grupo;

class GrupoFactory extends Factory
{
    protected $model = Grupo::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'activo' => rand(0,1),
            'carrera_id' => rand(1,30),
            'ciclo_escolar_id' => rand(1,30)
        ];
    }
}
