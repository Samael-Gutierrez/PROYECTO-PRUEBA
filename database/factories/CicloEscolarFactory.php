<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CicloEscolar; 

class CicloEscolarFactory extends Factory
{

    protected $model = CicloEscolar::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'activo' => $this->faker->randomDigit()
        ];
    }
}
