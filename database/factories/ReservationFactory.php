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

        $day = random_int(1, 30);

        if ($day < 10) {
            $day = '0' . $day;
        };

        return [
            'fryzjer_id' => random_int(1, 5),
            'zabieg_id' => random_int(1, 5),
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->unique()->lastName,
            'data' => '2020-' . random_int(10, 12) . '-' . $day,
            'godzina' => random_int(10, 20) . ':' . $godz[random_int(0, 1)]
        ];
    }
}
