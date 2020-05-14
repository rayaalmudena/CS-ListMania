<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserProfileController extends Controller
{
    //

    public function index(Request $request, $id){

    	$username= DB::select('SELECT name, id FROM users WHERE id='.$id.'');
        $username=$username[0]->name;

        
        $movies = DB::select('SELECT DISTINCT saved_objects.*, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="movies" and caches.type="movies" and user_id='.$id.' and favourite=1 ORDER BY name_object DESC');
        

		//Percenteges
        $arrayMovie= array();
        $countM = DB::select('SELECT count(*) as total FROM saved_objects WHERE type="movies"  and user_id='.$id.' and status is not null ');
        $WatchingM = DB::select('SELECT round(count(*)/'.$countM[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="movies" and user_id='.$id.' and status="Watching"');
        $DroppedM = DB::select('SELECT round(count(*)/'.$countM[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="movies" and user_id='.$id.' and status="Dropped"');
        $CompletedM = DB::select('SELECT round(count(*)/'.$countM[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="movies" and user_id='.$id.' and status="Completed"');
        $PlanM = DB::select('SELECT round(count(*)/'.$countM[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="movies"  and user_id='.$id.' and status="Plan to watch"');

        $arrayMovie["Watching"]=$WatchingM[0]->percentage;
        $arrayMovie["Dropped"]=$DroppedM[0]->percentage;
        $arrayMovie["Completed"]=$CompletedM[0]->percentage;
        $arrayMovie["Plan"]=$PlanM[0]->percentage;       

        $arrayMovie["WatchingCount"]=$WatchingM[0]->count;
        $arrayMovie["DroppedCount"]=$DroppedM[0]->count;
        $arrayMovie["CompletedCount"]=$CompletedM[0]->count;
        $arrayMovie["PlanCount"]=$PlanM[0]->count; 
        
        $arrayMovie["total"]=$countM[0]->total;
         //Percenteges
        


        $shows = DB::select('SELECT DISTINCT saved_objects.*, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="series" and caches.type="series" and user_id='.$id.' and favourite=1 ORDER BY name_object DESC');


         //Percenteges
        $arrayShow= array();
        $countS = DB::select('SELECT count(*) as total FROM saved_objects WHERE type="series"  and user_id='.$id.' and status is not null ');
        $WatchingS = DB::select('SELECT round(count(*)/'.$countS[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="series"  and user_id='.$id.' and status="Watching"');
        $DroppedS = DB::select('SELECT round(count(*)/'.$countS[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="series"  and user_id='.$id.' and status="Dropped"');
        $CompletedS = DB::select('SELECT round(count(*)/'.$countS[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="series"  and user_id='.$id.' and status="Completed"');
        $PlanS = DB::select('SELECT round(count(*)/'.$countS[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="series"  and user_id='.$id.' and status="Plan to watch"');

        $arrayShow["Watching"]=$WatchingS[0]->percentage;
        $arrayShow["Dropped"]=$DroppedS[0]->percentage;
        $arrayShow["Completed"]=$CompletedS[0]->percentage;
        $arrayShow["Plan"]=$PlanS[0]->percentage;       

        $arrayShow["WatchingCount"]=$WatchingS[0]->count;
        $arrayShow["DroppedCount"]=$DroppedS[0]->count;
        $arrayShow["CompletedCount"]=$CompletedS[0]->count;
        $arrayShow["PlanCount"]=$PlanS[0]->count;  

        $arrayShow["total"]=$countS[0]->total;
         //Percenteges

        

        $books = DB::select('SELECT DISTINCT saved_objects.*, caches.image FROM saved_objects LEFT JOIN caches ON saved_objects.api_id = caches.api_id WHERE saved_objects.type="books" and caches.type="books" and user_id='.$id.' and favourite=1 ORDER BY name_object DESC');

         //Percenteges
        $arrayBook= array();
        $countB = DB::select('SELECT count(*) as total FROM saved_objects WHERE type="books"  and user_id='.$id.' and status is not null ');
        $WatchingB = DB::select('SELECT round(count(*)/'.$countB[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="books"  and user_id='.$id.' and status="Watching"');
        $DroppedB = DB::select('SELECT round(count(*)/'.$countB[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="books"  and user_id='.$id.' and status="Dropped"');
        $CompletedB = DB::select('SELECT round(count(*)/'.$countB[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="books"  and user_id='.$id.' and status="Completed"');
        $PlanB = DB::select('SELECT round(count(*)/'.$countB[0]->total.'*100,2) as percentage, count(*) as count FROM saved_objects WHERE type="books"  and user_id='.$id.' and status="Plan to watch"');

        $arrayBook["Watching"]=$WatchingB[0]->percentage;
        $arrayBook["Dropped"]=$DroppedB[0]->percentage;
        $arrayBook["Completed"]=$CompletedB[0]->percentage;
        $arrayBook["Plan"]=$PlanB[0]->percentage;       

        $arrayBook["WatchingCount"]=$WatchingB[0]->count;
        $arrayBook["DroppedCount"]=$DroppedB[0]->count;
        $arrayBook["CompletedCount"]=$CompletedB[0]->count;
        $arrayBook["PlanCount"]=$PlanB[0]->count;  

        $arrayBook["total"]=$countB[0]->total; 
         //Percenteges

        return view('profile',['movies'=>$movies, 'shows'=>$shows, 'books'=>$books, 'username'=>$username, 'userid'=>$id,'arrayMovie'=> $arrayMovie, 'arrayShow'=>$arrayShow, 'arrayBook' =>$arrayBook]);
    }
}
