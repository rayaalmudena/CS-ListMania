<?php

use Illuminate\Database\Seeder;
use App\LikesReview;
class LikesReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\LikesReview::class,300)->create();
    }
}
