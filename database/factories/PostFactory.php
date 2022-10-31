<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{   protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return[
        'title' => fake()->title,
        'slug'=>fake()->text(255),
        'body' => fake()->text(255),
        'file_path'=>fake()->text(255),
        'published_at' => fake()->dateTime(),
        'created_at' => fake()->dateTime()];



    }
}
