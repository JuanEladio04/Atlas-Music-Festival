<?php

namespace Database\Factories;

use App\Models\Pass;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'photo_path' => $this->faker->imageUrl(),
        ];
    }
}
