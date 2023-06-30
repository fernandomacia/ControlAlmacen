<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $nombre = $faker->firstName() . " " . $faker->lastName() . " " . $faker->lastName();

        return [
            'dni' => $faker->dni(),
            'name' => $nombre,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => Hash::make('password'),
            'lang' => 'es',
            'remember_token' => null,
            'updated_at' => now(),
            'created_at' => now(),
            'enabled' => false
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
