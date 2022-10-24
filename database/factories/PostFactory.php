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
        // $faker = Faker::create();
    	// foreach (range(1,500) as $index) {
        //     DB::table('posts')->insert([
        //         'title' => $faker->title,
        //         'body' => $faker->body,
        //         'published_at' => $faker->published_at,
        //         'created_at' => $faker->created_at,
        //         'updated_at'=>$faker->post_creator,
        //         'dob' => $faker->date($format = 'D-m-y', $max = '2010',$min = '1980')
        //     ]);
        // }

        return[ 'title' => fake()->title,
        'body' => fake()->text(255),
        'published_at' => fake()->dateTime(),
        'created_at' => fake()->dateTime()];
        // 'updated_at'=>fake()->post_creator,


    }
}
