<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    protected $model = Etudiant::class;

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

    public function configure()
    {
        return $this->afterCreating(function (Etudiant $etudiant) {
            // Crée un User lié à cet étudiant
            $etudiant->user()->create([
                'name' => $etudiant->nom,
                'email' => $etudiant->courriel,
                'password' => Hash::make('password')
            ]);
        });
    }
}

