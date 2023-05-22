<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdministradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->randomElement(['Sr.', 'Lic.', 'Ing.']),
            'nombre' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => bcrypt('password'),
            'activo' => rand(0,1),
            'area_id' => rand(1,5)
        ];
    }
}
