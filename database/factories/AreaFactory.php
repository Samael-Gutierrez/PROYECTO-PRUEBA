<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['BIBLIOTECA', 'VINCULACIÓN', 'CONTROL ESCOLAR', 'TUTORÍAS', 'ACADÉMICAS'])
        ];
    }
}
