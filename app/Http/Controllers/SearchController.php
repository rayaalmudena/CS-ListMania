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
	    $user = DB::select('SELECT DISTINCT api_id, type, image, title FROM caches WHERE LOWER(title) like LOWER("%'.$search.'%") group by api_id, type, title  ORDER BY title DESC ');
	    if (count ( $user ) > 0)
	        return view ( 'search' )->withDetails ( $user )->withQuery ( $search );
	    else
	        return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' )->withQuery ( $search );
	}

 }

