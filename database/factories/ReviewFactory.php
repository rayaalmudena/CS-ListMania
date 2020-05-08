<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' =>$faker->numberBetween($min = 1, $max = 20),
		'saved_object_id'=> $faker->numberBetween($min = 1, $max = 5),
		'title'=>$faker->realText($maxNbChars = 30, $indexSize = 1),
		'text'=> $faker->realText($maxNbChars = 300, $indexSize = 1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
