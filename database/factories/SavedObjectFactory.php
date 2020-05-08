<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SavedObject;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SavedObject::class, function (Faker $faker) {

	$type=random_int(0, 2);
	$positionList=random_int(0, 9);

	$timemark=null;
	$episode=null;
	$season=null;
	$bookmark=null;

	if ($type==0) {
		$type="movies";
		$listName=array("El padrino","Casablanca","Beauty and the Beast","Spirited Away","Dumbo","Psycho","The Godfather","Singin' In The Rain","Parasite","Gravity");
		$listID=array("tt0325950","tt0034583","tt0101414","tt0245429","tt0033563","tt0054215","tt0068646","tt0045152","tt6751668","tt1454468");

		
		$timemark=random_int(5, 55);


	}elseif ($type==1) {
		$type="series";
		$listName=array("Game of Thrones","Breaking Bad","Parks and Recreation","Stranger Things","Black Mirror","The Crown","Chernobyl","Peaky Blinders","Dark","Doctor Who");
		$listID=array("tt0944947","tt0903747","tt1266020","tt4574334","tt2085059","tt4786824","tt7366338","tt2442560","tt5753856","tt0436992");

		$episode=random_int(1, 6);
		$season=random_int(1, 2);

	}else{
		$type="books";
		$listName=array("Shiver","The Hunger Games: Special Edition","Death note","Don Quijote de la Mancha","Divergent","La Sombra del Viento","Don Juan Tenorio","La Celestina","La vida es sueño","Luces de bohemia");
		$listID=array("Jh47BAAAQBAJ","2n4evAEACAAJ","-otLPQAACAAJ","5s4OAAAAYAAJ","nv9lZM_0RI4C","hTDXDwAAQBAJ","smkijUyvXgEC","4cwNAAAAYAAJ","kRd9LNd6_lsC","s12wDwAAQBAJ");
		$bookmark=random_int(10, 500);
	}

    return [
    	'user_id' =>$faker->numberBetween($min = 1, $max = 20),


		'api_id'=> $listID[$positionList],
		'name_object'=> $listName[$positionList],
		'type'=> $type,
		'timemark'=> $timemark,
		'bookmark'=> $bookmark,
		'episode'=> $faker->numberBetween($min = 0, $max = 10),
		'status'=> $faker->randomElement(['Watching', 'Plan to watch','Dropped','Completed']),
		'favourite'=> $faker->numberBetween($min = 0, $max = 1),
		'rating'=> $faker->numberBetween($min = 0, $max = 10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
