<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompaniesFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->randomNumber(8,true),
            'Name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'logo' => fake()->fileExtension(),
            'website' => fake()->url()	
        ];
    }
}
