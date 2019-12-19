<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PostsSeeder::class);
       // $this->call(ProductsSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(TaskSeeder::class);

    }
}
