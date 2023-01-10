<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lieferantenId' => $this->faker->unique()->numberBetween(1,250),
            'artikelName' => $this->faker->name,
            "anzahl" => $this->faker->unique()->numberBetween(10,1000),
            "preis" =>  $this->faker->unique()->numberBetween(2,35),
        ];
    }
}
