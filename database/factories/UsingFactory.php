<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Using>
 */
class UsingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $thing_IDs = Thing::all()->pluck('id')->toArray();
        $place_IDs = Place::all()->pluck('id')->toArray();
        $user_IDs = User::all()->pluck('id')->toArray();

        return [
            'thing_id' => $this->faker->randomElement($thing_IDs),
            'place_id' => $this->faker->randomElement($place_IDs),
            'user_id' => $this->faker->randomElement($user_IDs),
            'amount' => $this->faker->numberBetween(1, 128)
        ];
    }
}
