<?php

namespace Database\Factories;

use App\Models\Fryzjer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FryzjerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fryzjer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->lastName(),
            'pic' => $this->faker->imageUrl(),
            'opis' => $this->faker->realText(20),
        ];
    }
}
