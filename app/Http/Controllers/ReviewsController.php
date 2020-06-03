<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Auth;
use Redirect;

class ReviewsController extends Controller
{
    public function likeUser(Request $request){

    	$user = Auth::user();
        $user_id=$user->id; 
        
        DB::insert('insert into likes_reviews (user_id, review_id , created_at,updated_at ) values (?,?,?,?)',[$user_id,$request->input('id_review'), date('Y-m-d h:i:s', time()) ,date('Y-m-d h:i:s', time())]);        

    }

     public function saveReview(Request $request, $type ,$id)
    { 
	   	$title = $request->titleReview;
	   	$text = $request->textReview;
	   	$user = Auth::user();
        $user_id=$user->id; 

        //dd($user_id,$id,$type,$title,$text);
	    DB::insert('insert into reviews (user_id, api_id, type , title, text, created_at,updated_at ) values (?,?,?,?,?,?,?)',[$user_id,$id,$type,$title,$text, date('Y-m-d h:i:s', time()) ,date('Y-m-d h:i:s', time())]);
	    return back();
	}


     public function indexAllReviews($id,$type,$order)
    {    
        
        if($type=="movie"){
            $newType="movies";
        }elseif ($type=="show") {
            $newType="series";
        }elseif ($type=="book") {
            $newType="books";
        }else{
          return Redirect::to('/');
        }

        if($order=="new"){
            $newOrder="r.updated_at";
        }elseif ($order=="top") {
            $newOrder="likes";
        }else{
            return Redirect::to('/');
        }


        $title= DB::select('SELECT title FROM caches WHERE type="'.$newType.'" and api_id="'.$id.'"');

        if(isset($title[0])){
        
            $reviews=DB::select('SELECT r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at, COUNT(lr.review_id) AS likes FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id LEFT JOIN users AS u ON r.user_id = u.id WHERE r.api_id="'.$id.'" and r.type="'.$newType.'" GROUP by r.id, r.user_id, u.name, r.api_id, r.type, r.title, r.text, r.updated_at ORDER BY '.$newOrder.' DESC' );

            if (Auth::user()) {   // Check is user logged in

                $user = Auth::user(); 
                $likesUser=DB::select('SELECT r.id, COUNT(lr.review_id) AS userlike FROM reviews AS r LEFT JOIN likes_reviews AS lr ON lr.review_id = r.id WHERE r.api_id="'.$id.'" and r.type="'.$newType.'" and lr.user_id='.$user->id.'  GROUP by r.id ORDER BY userlike  DESC');
                foreach ($reviews as $review) {
                   foreach ($likesUser as $like) {
                       if($like->id==$review->id){
                        $review->userlike=1;
                       }
                   }
                }                  
            } 
            return view('details.allReviews',['title'=>$title,'idObject'=> $id, 'type'=>$type, 'order'=>$order, 'reviews'=>$reviews]);
            
        }else{
            return Redirect::to('/');
        }
    }

}