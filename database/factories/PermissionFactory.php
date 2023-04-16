<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome'  => fake()->name,
            'descricao' => fake()->text(),
        ];
    }
}
