<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'logo' => null,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'background_color' => $this->faker->hexColor,
            'text_color' => $this->faker->hexColor,
            'link_background_color' => $this->faker->hexColor,
            'link_text_color' => $this->faker->hexColor,
            'link_border_radius' => $this->faker->randomElement(['0rem', '0.5rem', '3rem']),
        ];
    }
}
