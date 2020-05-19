<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $movies = DB::select('SELECT DISTINCT saved_objects.api_id, saved_objects.name_object, round(AVG(saved_objects.rating),2) as rating, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="movies" and rating is not null  GROUP BY saved_objects.api_id, saved_objects.name_object ORDER BY saved_objects.rating DESC LIMIT 10');

        $shows = DB::select('SELECT DISTINCT saved_objects.api_id, saved_objects.name_object, round(AVG(saved_objects.rating),2) as rating, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="series" and rating is not null  GROUP BY saved_objects.api_id, saved_objects.name_object ORDER BY saved_objects.rating DESC LIMIT 10');

        $books = DB::select('SELECT DISTINCT saved_objects.api_id, saved_objects.name_object, round(AVG(saved_objects.rating),2) as rating, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="books" and rating is not null  GROUP BY saved_objects.api_id, saved_objects.name_object ORDER BY saved_objects.rating DESC LIMIT 10');
       // dd($series);

        return view('home', ['movies'=>$movies, 'shows'=>$shows, 'books'=>$books]);
    }
}
