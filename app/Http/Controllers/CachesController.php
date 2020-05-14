<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Cache;
use DB;
use Auth;
class CachesController extends Controller
{

    //Return view of objects with id if object
     public function indexMovie($id)
    {   

        $countFav= DB::select('SELECT sum(favourite) as sum FROM saved_objects WHERE type="movies" and api_id="'.$id.'" and favourite=1  GROUP BY api_id ');
        $rating= DB::select('SELECT round(AVG(rating),2) as rating FROM saved_objects WHERE type="movies" and api_id="'.$id.'" and rating is not null  GROUP BY api_id '); 
        $reviews=DB::select('SELECT r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at, COUNT(lr.review_id) AS likes FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id LEFT JOIN users AS u ON r.user_id = u.id WHERE r.api_id="'.$id.'" and r.type="movies" GROUP by r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at ORDER BY likes  DESC LIMIT 4');


        if (Auth::user()) {   // Check is user logged in

            $user = Auth::user();
            $saved = DB::select('SELECT * FROM saved_objects WHERE api_id="'.$id.'" and type="movies" AND user_id ='.$user->id.'');

            $likesUser=DB::select('SELECT r.id, COUNT(lr.review_id) AS userlike FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id WHERE r.api_id="'.$id.'" and r.type="movies" and lr.user_id='.$user->id.'  GROUP by r.id ORDER BY userlike  DESC');
            foreach ($reviews as $review) {
               foreach ($likesUser as $like) {
                   if($like->id==$review->id){
                    $review->userlike=1;
                   }
               }
            }
                        
            if(isset($saved[0])){
                return view('details.movieOrShow',['idObject'=>$id,'saved'=>$saved,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }else{
                return view('details.movieOrShow',['idObject'=>$id,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }
            

        } else {
            return view('details.movieOrShow',['idObject'=>$id,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
        }
    	
    }

     public function indexShow($id)
    {   

        $countFav= DB::select('SELECT sum(favourite) as sum FROM saved_objects WHERE type="series" and api_id="'.$id.'" and favourite=1  GROUP BY api_id ');
        $rating= DB::select('SELECT round(AVG(rating),2) as rating FROM saved_objects WHERE type="series" and api_id="'.$id.'" and rating is not null  GROUP BY api_id ');
        $reviews=DB::select('SELECT r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at, COUNT(lr.review_id) AS likes FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id LEFT JOIN users AS u ON r.user_id = u.id WHERE r.api_id="'.$id.'" and r.type="series" GROUP by r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at ORDER BY likes  DESC LIMIT 4');

        if (Auth::user()) {   // Check is user logged in

            $user = Auth::user();
            $saved = DB::select('SELECT * FROM saved_objects WHERE api_id="'.$id.'" and type="series" AND user_id ='.$user->id.'');

            $likesUser=DB::select('SELECT r.id, COUNT(lr.review_id) AS userlike FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id WHERE r.api_id="'.$id.'" and r.type="series" and lr.user_id='.$user->id.'  GROUP by r.id ORDER BY userlike  DESC');
            foreach ($reviews as $review) {
               foreach ($likesUser as $like) {
                   if($like->id==$review->id){
                    $review->userlike=1;
                   }
               }
            }
            
            
            if(isset($saved[0])){                
                return view('details.movieOrShow',['idObject'=>$id,'saved'=>$saved,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }else{
                return view('details.movieOrShow',['idObject'=>$id,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }            

        } else {
            return view('details.movieOrShow',['idObject'=>$id,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
        }
        
    }

     public function indexBook($id)
    {   

        $countFav= DB::select('SELECT sum(favourite) as sum FROM saved_objects WHERE type="books" and api_id="'.$id.'" and favourite=1  GROUP BY api_id ');
        $rating= DB::select('SELECT round(AVG(rating),2) as rating FROM saved_objects WHERE type="books" and api_id="'.$id.'" and rating is not null  GROUP BY api_id ');
        $reviews=DB::select('SELECT r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at, COUNT(lr.review_id) AS likes FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id LEFT JOIN users AS u ON r.user_id = u.id WHERE r.api_id="'.$id.'" and r.type="books" GROUP by r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at ORDER BY likes  DESC LIMIT 4');

        if (Auth::user()) {   // Check is user logged in

            $user = Auth::user();
            $saved = DB::select('SELECT * FROM saved_objects WHERE api_id="'.$id.'" and type="books" AND user_id ='.$user->id.'');
            $likesUser=DB::select('SELECT r.id, COUNT(lr.review_id) AS userlike FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id WHERE r.api_id="'.$id.'" and r.type="books" and lr.user_id='.$user->id.'  GROUP by r.id ORDER BY userlike  DESC');
            foreach ($reviews as $review) {
               foreach ($likesUser as $like) {
                   if($like->id==$review->id){
                    $review->userlike=1;
                   }
               }
            }
            
            
            if(isset($saved[0])){                
                return view('details.book',['idObject'=>$id,'saved'=>$saved,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }else{
                return view('details.book',['idObject'=>$id,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
            }             

        } else {
            return view('details.book',['idObject'=>$id ,'rating'=>$rating,'countFav'=>$countFav, 'reviews'=>$reviews]);
        }

    }


    //save on cache objects
    public function saveMovieOrShow(Request $request)
    {   
        $new= new Cache;       
        
        if ($request->input('Type')=="movie") {
            $new->type  = "movies" ;
        }else{
            $new->type  = "series" ;
        }

        $new->title = $request->input('Title');
        $new->awards = $request->input('Awards');
        $new->country = $request->input('Country');
        $new->director = $request->input('Director');
        $new->writer  = $request->input('Writer');
        $new->actors  = $request->input('Actors');
        $new->genre  = $request->input('Genre');
        $new->language  = $request->input('Language');
        $new->plot  = $request->input('Plot');
        $new->image  = $request->input('Poster');
        $new->rated  = $request->input('Rated');
        $new->released  = $request->input('Released');
        $new->runtime = $request->input('Runtime');
        $new->api_id  = $request->input('imdbID');

        $new->save();
        
    }    


    //save on cache objects
    public function saveBook(Request $request)
    {   
        $new= new Cache;       
        
        $new->type  = "books" ; 
        $new->title = $request->input('Title');
        $new->country = $request->input('Country');
        $new->api_id = $request->input('Id');
        $new->authors  = $request->input('Authors');        
        $new->genre  = $request->input('Genre');        
        $new->plot  = $request->input('Plot');
        $new->image  = $request->input('Image');
        $new->language  = $request->input('Language');
        $new->rated  = $request->input('Rated');
        $new->publisher  = $request->input('Publisher');
        $new->pages  = $request->input('Pages');
        $new->released  = $request->input('Released');        

        $new->save();
        
    }


    //Get cache items
    public function getMovieOrShow(Request $request,$id){

        $returnThis = DB::select('SELECT DISTINCT * FROM caches WHERE (type="movies" OR  type="series") AND api_id ="'.$id.'"');
        
        return Response::json($returnThis);

    }

    //Get cache items
    public function getBook(Request $request,$id){

        $returnThis = DB::select('SELECT DISTINCT * FROM caches WHERE type="books" AND api_id ="'.$id.'"');
        
        return Response::json($returnThis);

    }

   
}
