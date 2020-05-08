<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SavedObject;
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
        $movies = DB::select('SELECT api_id, name_object, round(AVG(rating),2) as rating FROM saved_objects WHERE type="movies" and rating is not null  GROUP BY api_id, name_object ORDER BY rating DESC LIMIT 10');

        $shows = DB::select('SELECT api_id, name_object, round(AVG(rating),2) as rating FROM saved_objects WHERE type="series" and rating is not null GROUP BY api_id, name_object ORDER BY rating DESC LIMIT 10');

        $books = DB::select('SELECT api_id, name_object, round(AVG(rating),2) as rating FROM saved_objects WHERE type="books" and rating is not null GROUP BY api_id, name_object ORDER BY rating DESC LIMIT 10');
       // dd($series);

        return view('home', ['movies'=>$movies, 'shows'=>$shows, 'books'=>$books]);
    }
}
