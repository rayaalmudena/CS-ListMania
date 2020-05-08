<?php

use Illuminate\Database\Seeder;
use App\Review;
class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Review::class,30)->create();
    }
}
