<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thing>
 */
class ThingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::all()->pluck('id')->toArray();
        $author = $this->faker->randomElement($userIds);

        return [
            'name' => $this->faker->sentence(1),
            'description' => $this->faker->realText(64),
            'wrst' => $this->faker->date(),
            'owner_id' => $author,
            'author_id' => $author
        ];
    }
}
