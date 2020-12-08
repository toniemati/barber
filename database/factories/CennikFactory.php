<?php

namespace Database\Factories;

use App\Models\Cennik;
use Illuminate\Database\Eloquent\Factories\Factory;

class CennikFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cennik::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fryzjer_id' => random_int(1, 5),
            'zabieg_id' => random_int(1, 5),
            'cena' => random_int(50, 200),
        ];
    }
}
