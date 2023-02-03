<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isWork = $this->faker->boolean();
        $userIds = User::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->realText(64),
            'repair' => !$isWork,
            'work' => $isWork,
            'author_id' => $this->faker->randomElement($userIds)
        ];
    }
}
