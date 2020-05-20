<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Cache;
use DB;


class SearchController extends Controller
{
     public function search(Request $request)
    { 
	   	$search = $request->searchThis;
	    $user = DB::select('SELECT DISTINCT api_id, type, title FROM caches WHERE LOWER(title) like LOWER("%'.$search.'%") ORDER BY title DESC ');

	    $imageAdd = DB::select('SELECT DISTINCT api_id, type, image  FROM caches WHERE LOWER(title) like LOWER("%'.$search.'%") group by api_id, type, image, ORDER BY title DESC ');

	    foreach ($user as $user1) {
               foreach ($imageAdd as $image) {
                   if($image->api_id==$user1->api_id and $image->type==$user1->type){
                    $user1->image=$image->image;
                   }
               }
            }


	    if (count ( $user ) > 0)
	        return view ( 'search' )->withDetails ( $user )->withQuery ( $search );
	    else
	        return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' )->withQuery ( $search );
	}

 }

