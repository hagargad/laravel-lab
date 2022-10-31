<?php

// use OrderStatusSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CommentsSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentsSeeder::class);

    }
}
