<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Cache;
use DB;
use Auth;

class SavedObjectsController extends Controller
{

    public function moviesUser(Request $request, $id)
    {   
    	$username= DB::select('SELECT name, id FROM users WHERE id='.$id.'');
        $username=$username[0]->name;
              
        $all = DB::select('SELECT * FROM saved_objects WHERE type="movies" and user_id='.$id.' and status is not null ORDER BY name_object, status DESC');
        
        return view('lists.movies', ['all'=>$all, 'username'=>$username, 'userid'=>$id]);
    }


    public function showsUser(Request $request, $id)
    {   
    	$username= DB::select('SELECT name, id FROM users WHERE id='.$id);
        $username=$username[0]->name;
        
        $all = DB::select('SELECT * FROM saved_objects WHERE type="series" and user_id='.$id.' and status is not null ORDER BY name_object, status DESC');       

        return view('lists.shows', ['all'=>$all, 'username'=>$username, 'userid'=>$id]);
    }


    public function booksUser(Request $request, $id)
    {   
    	$username= DB::select('SELECT name, id FROM users WHERE id='.$id);
        $username=$username[0]->name;
       

        $all = DB::select('SELECT * FROM saved_objects WHERE type="books" and user_id='.$id.' and status is not null ORDER BY name_object, status DESC');

       return view('lists.books', ['all'=>$all, 'username'=>$username, 'userid'=>$id]);
    }




     public function saveMovieUser(Request $request){

        $user = Auth::user();
        $user_id=$user->id;

        //check db for row       
        $check = DB::select('SELECT * FROM saved_objects WHERE type="movies" AND user_id ="'.$user_id.'" AND api_id="'.$request->input('api_id').'"');    

        //if empty insert into db
        if (empty($check)) {
           DB::insert('insert into saved_objects (user_id, api_id, name_object,type,timemark,rating,status,favourite,created_at,updated_at ) values (?, ?, ?, ?, ?, ?, ?,?,?,?)',[$user_id,$request->input('api_id'),$request->input('title'),"movies",$request->input('timemark'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time()) ,date('Y-m-d h:i:s', time())]);            

        }else{
            //if not empty update
            $affected = DB::update('update saved_objects set timemark = ?, rating = ?, status = ?, favourite = ? , updated_at= ? where user_id = "'.$user_id.'" AND api_id="'.$request->input('api_id').'" AND type="movies"' , [$request->input('timemark'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time())]);

        }       

    }


    public function saveShowUser(Request $request){

        $user = Auth::user();
        $user_id=$user->id;

        //check db for row       
        $check = DB::select('SELECT * FROM saved_objects WHERE type="series" AND user_id ="'.$user_id.'" AND api_id="'.$request->input('api_id').'"');    

        //if empty insert into db
        if (empty($check)) {
           DB::insert('insert into saved_objects (user_id, api_id, name_object,type,timemark,rating,status,favourite,created_at,updated_at,season,episode) values (?, ?, ?, ?, ?, ?, ?,?,?,? ,?,?)',[$user_id,$request->input('api_id'),$request->input('title'),"series",$request->input('timemark'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time()) ,date('Y-m-d h:i:s', time()),$request->input('season') ,$request->input('episode')]);            

        }else{
            //if not empty update
            $affected = DB::update('update saved_objects set timemark = ?, rating = ?, status = ?, favourite = ? , updated_at= ? , season = ?, episode = ? where user_id = "'.$user_id.'" AND api_id="'.$request->input('api_id').'" AND type="series"' , [$request->input('timemark'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time()), $request->input('season') ,$request->input('episode')]);

        }       

    }

    public function saveBookUser(Request $request){

        $user = Auth::user();
        $user_id=$user->id;

        //check db for row       
        $check = DB::select('SELECT * FROM saved_objects WHERE type="books" AND user_id ="'.$user_id.'" AND api_id="'.$request->input('api_id').'"');    

        //if empty insert into db
        if (empty($check)) {
           DB::insert('insert into saved_objects (user_id, api_id, name_object,type,bookmark,line,rating,status,favourite,created_at,updated_at ) values (?, ?, ?, ?, ?, ?, ?, ?,?,?,?)',[$user_id,$request->input('api_id'),$request->input('title'),"books",$request->input('bookmark'),$request->input('line'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time()) ,date('Y-m-d h:i:s', time())]);            

        }else{
            //if not empty update
            $affected = DB::update('update saved_objects set bookmark = ?, line = ?, rating = ?, status = ?, favourite = ? , updated_at= ? where user_id = "'.$user_id.'" AND api_id="'.$request->input('api_id').'" AND type="books"' , [$request->input('bookmark'),$request->input('line'),$request->input('rating'),$request->input('status'),$request->input('fav'), date('Y-m-d h:i:s', time())]);

        }       

    }


}
