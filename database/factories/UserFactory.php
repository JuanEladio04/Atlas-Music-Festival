<?php

namespace Database\Factories;

use App\Models\Pass;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'DNI' => $this->faker->unique()->numerify('########'),
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'f_nac' => $this->faker->date(),
            'n_telf' => $this->faker->randomNumber(9),
            'type' => $this->faker->randomElement(['admin', 'user', 'singer']),
            'pass' => Pass::factory(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indica que el usuario tiene canciones.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withSongs()
    {
        return $this->afterCreating(function (User $user) {
            $user->songs()->attach(
                Song::factory()->count(rand(1, 5))->create()->pluck('id')->toArray()
            );
        });
    }
}
