<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'excerpt' => $this->faker->text(160),
            'body' => collect($this->faker->paragraphs(6))->map(fn ($p) => "<p>{$p}</p>")->implode("\n"),
            'cover_image' => null,
            'published_at' => $this->faker->boolean(80) ? now()->subDays($this->faker->numberBetween(0, 120)) : null,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
