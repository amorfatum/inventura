<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bestellformular>
 */
class BestellformularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'artikelId' => $this->faker->unique()->numberBetween(1,250),
            "lieferantenId" => $this->faker->unique()->numberBetween(1,250),
            "anzahl" =>  $this->faker->unique()->numberBetween(10,1000),
        ];
    }
}