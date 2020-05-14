<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LikesReview;
use Faker\Generator as Faker;

$factory->define(LikesReview::class, function (Faker $faker) {
    return [
        'review_id' =>$faker->numberBetween($min = 1, $max = 30),
		'user_id'=> $faker->numberBetween($min = 1, $max = 20),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
