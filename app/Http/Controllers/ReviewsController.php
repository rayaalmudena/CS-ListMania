<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Auth;

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
}