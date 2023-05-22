<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera; 

class CarreraFactory extends Factory
{
    protected $model = Carrera::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'activo' => $this->faker->randomDigit()
        ];
    }
}
