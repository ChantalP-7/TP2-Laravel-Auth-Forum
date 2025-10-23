<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseau>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'dateNaissance' => $this->faker->date('Y-m-d', '-18 years'),
            'courriel' => $this->faker->unique()->safeEmail,            
            'Ville_id' => Ville::inRandomOrder()->first()?->id ?? Ville::factory()
        ];
    }
}
