<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PersonaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'birthdate'=> fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'user_photo' => null,
        ];
    }
}
