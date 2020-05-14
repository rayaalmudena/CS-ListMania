<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {

	$type=random_int(0, 2);
	$positionList=random_int(0, 9);

	if ($type==0) {
		$type="movies";		
		$listID=array("tt0325950","tt0034583","tt0101414","tt0245429","tt0033563","tt0054215","tt0068646","tt0045152","tt6751668","tt1454468");
	}elseif ($type==1) {
		$type="series";		
		$listID=array("tt0944947","tt0903747","tt1266020","tt4574334","tt2085059","tt4786824","tt7366338","tt2442560","tt5753856","tt0436992");

	}else{
		$type="books";
		$listID=array("Jh47BAAAQBAJ","2n4evAEACAAJ","-otLPQAACAAJ","5s4OAAAAYAAJ","nv9lZM_0RI4C","hTDXDwAAQBAJ","smkijUyvXgEC","4cwNAAAAYAAJ","kRd9LNd6_lsC","s12wDwAAQBAJ");
	}

    return [
        'user_id' =>$faker->numberBetween($min = 1, $max = 20),
		'api_id'=> $listID[$positionList],
		'type'=> $type,
		'title'=>$faker->realText($maxNbChars = 30, $indexSize = 1),
		'text'=> $faker->realText($maxNbChars = 300, $indexSize = 1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
