<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    protected $table='caches';

    protected $fillable = [
    	'api_id',
    	'type',
    	'title',
    	'awards',
    	'country',
    	'director',
    	'writer',
		'actors', 
        'genre', 
        'language', 
        'plot', 
        'image', 
        'rated', 
        'runtime',
        'released',            
        'authors', 
        'publisher', 
        'pages',
    ];
}
