<?php

namespace Database\Factories;

use App\Models\Zabieg;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZabiegFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zabieg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
        ];
    }
}
