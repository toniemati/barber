<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $godz = ['30', '00'];

        return [
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->unique()->lastName,
            'data' => '2020-12-0' . random_int(3, 9),
            'godzina' => random_int(10, 20) . ':' . $godz[random_int(0, 1)]
        ];
    }
}
