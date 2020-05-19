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
        $this->call(UsersSeeder::class);
        $this->call(SavedObjectsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(LikesReviewsTableSeeder::class);
    }
}
