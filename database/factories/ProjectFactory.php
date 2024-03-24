<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Storage::makeDirectory('projects');
        $title =  fake()->text(20);
        $slug = Str::slug($title);
        $img = fake()->image(null, 250, 250);
        $img_url = Storage::putFileAs('projects', $img, "$slug.png");

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->paragraphs(15, true),
            'image' => $img_url,
            'is_published' => fake()->boolean()
        ];
    }
}
