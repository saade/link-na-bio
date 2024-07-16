<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'background_color' => $this->faker->hexColor,
            'text_color' => $this->faker->hexColor,
            'border_radius' => $this->faker->randomElement(['0rem', '0.5rem', '3rem']),
            'is_active' => Lottery::odds(1, 10)->winner(fn () => false)->loser(fn () => true)->choose(),
        ];
    }
}
