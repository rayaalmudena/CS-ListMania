@extends('layouts.app')
@section('links')
<link href="{{ asset('css/detailsOb.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('tittlePage', $username .' Profile')
@section('content')
<div class="container">
  <div class="col-12"> 

    <div class="row">
      <div class="objectSearch">
        <h1 class="title" id="title">{{$username}} Profile</h1>
      </div>      

      <div class="col-sm-10 col-md-10 col-xs-12 mx-auto mt-2" style="word-wrap: break-word;">              
            <div class="table-responsive-sm">
                <table style="table-layout: fixed;" class="table table-sm table-borderless text-center">                  
                  <tbody>
                  <tr>
                    <td colspan="6" class="text-light" style="font-size: 29px;background-color: #e28413;">Stats</td>
                  </tr>
                  <tr>
                    <td scope="col" class="text-light" style="background-color: #746d75;">Type</td>
                    <td scope="col" class="bg-info text-light">Watching</td>
                    <td scope="col" class="text-light" style="background-color: black;">Dropped</td>
                    <td scope="col" class="bg-success text-light">Completed</td>
                    <td scope="col" class="text-light" style="background-color: purple;">Plan to Watch</td>
                    <td scope="col" class="text-light" style="background-color: #746d75;">Total</td>
                  </tr>
                                
                  <tr>
                    <td class="text-" style="background-color: #;">Movies</td>                    
                    <td class="" colspan="4">
                      <div class="progress mt-1">
                        @if($arrayMovie['WatchingCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{$arrayMovie['Watching']}}%" aria-valuenow="{{$arrayMovie['Watching']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayMovie["WatchingCount"]}}</div>
                        @endif

                        @if($arrayMovie['DroppedCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  style="background-color: black; width: {{$arrayMovie['Dropped']}}%" aria-valuenow="{{$arrayMovie['Dropped']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayMovie["DroppedCount"]}}</div>
                        @endif

                        @if($arrayMovie['CompletedCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{$arrayMovie['Completed']}}%" aria-valuenow="{{$arrayMovie['Completed']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayMovie["CompletedCount"]}}</div>
                        @endif

                        @if($arrayMovie['PlanCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated text-light" role="progressbar" style="background-color:purple ;width: {{$arrayMovie['Plan']}}%" aria-valuenow="{{$arrayMovie['Plan']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayMovie["PlanCount"]}}</div>
                        @endif                    
                        
                      </div>
                    </td>
                    <td>{{$arrayMovie["total"]}}</td>  
                    <tr>
                      <td class="text-" style="background-color: #;">Shows</td>                      
                      <td class="" colspan="4">
                        <div class="progress mt-1">
                          @if($arrayShow['WatchingCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{$arrayShow['Watching']}}%" aria-valuenow="{{$arrayShow['Watching']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayShow["WatchingCount"]}}</div>
                          @endif

                          @if($arrayShow['DroppedCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  style="background-color: black; width: {{$arrayShow['Dropped']}}%" aria-valuenow="{{$arrayShow['Dropped']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayShow["DroppedCount"]}}</div>
                          @endif

                          @if($arrayShow['CompletedCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{$arrayShow['Completed']}}%" aria-valuenow="{{$arrayShow['Completed']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayShow["CompletedCount"]}}</div>
                          @endif

                          @if($arrayShow['PlanCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated text-light" role="progressbar" style="background-color:purple ;width: {{$arrayShow['Plan']}}%" aria-valuenow="{{$arrayShow['Plan']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayShow["PlanCount"]}}</div>
                          @endif      
                        </div>
                      </td>
                      <td>{{$arrayShow["total"]}}</td>
                    </tr>       
                    <tr>
                      <td class="text-" style="background-color: #;">Books</td>
                      <td class="" colspan="4">
                        <div class="progress mt-1">
                          @if($arrayBook['WatchingCount']!=0)
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{$arrayBook['Watching']}}%" aria-valuenow="{{$arrayBook['Watching']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayBook["WatchingCount"]}}</div>
                          @endif

                          @if($arrayBook['DroppedCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  style="background-color: black; width: {{$arrayBook['Dropped']}}%" aria-valuenow="{{$arrayBook['Dropped']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayBook["DroppedCount"]}}</div>
                          @endif

                          @if($arrayBook['CompletedCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{$arrayBook['Completed']}}%" aria-valuenow="{{$arrayBook['Completed']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayBook["CompletedCount"]}}</div>
                          @endif

                          @if($arrayBook['PlanCount']!=0)
                            <div class="progress-bar progress-bar-striped progress-bar-animated text-light" role="progressbar" style="background-color:purple ;width: {{$arrayBook['Plan']}}%" aria-valuenow="{{$arrayBook['Plan']}}" aria-valuemin="0" aria-valuemax="100">{{$arrayBook["PlanCount"]}}</div>
                          @endif      
                      </td>
                      <td>{{$arrayBook["total"]}}</td>
                    </tr> 
                  </tbody>
                  </table>
                </div>
               </div> 
           
              
      
      <div class="col-sm-10 col-md-10 col-xs-12 mx-auto" style="word-wrap: break-word;">  

            <div class="card mt-3">
                <div class="card-header">Favourite Movies</div>
                <div class="card-body tMovies">
                    @if (count($movies) == 0)
                            This user doesn't have favourite movies.
                    @else                     
                       
                        <div class="horizontal-scroll-container">
                         @foreach ($movies as $movie)
                            <a  class="searchThisMS" href="/movie/{{ $movie->api_id }}">
                                <div name="movie" id="{{ $movie->api_id }}">                                    
                                    <p name="{{$movie->name_object}}"> 
                                        {{$movie->name_object}}</p>
                                    @if(strlen($movie->image)>5)
                                    <img style="height: 120px;" src="{{$movie->image}}" sr alt="image{{$movie->name_object}}">
                                    @else
                                     <img style="height: 120px;" src="{{asset('images/defaultMovie.png')}}" sr alt="image{{$movie->name_object}}">
                                    @endif
                                </div>
                            </a> 
                           
                        @endforeach
                        </div>
                    @endif
                    
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Favourite Shows</div>
                <div class="card-body tShows">                    
                    @if (count($shows) == 0)
                        This user doesn't have favourite movies.
                    @else
                        
                        <div class="horizontal-scroll-container">
                         @foreach ($shows as $show)
                            <a class="searchThisMS" href="/show/{{ $show->api_id }}">
                                <div name="show" id="{{ $show->api_id }}">
                                    <p name="name">{{$show->name_object}}</p>
                                     @if(strlen($show->image)>5)
                                    <img style="height: 120px;" src="{{$show->image}}" sr alt="image{{$show->name_object}}">
                                    @else
                                     <img style="height: 120px;" src="{{asset('images/defaultShow.png')}}" sr alt="image{{$show->name_object}}">
                                    @endif
                                </div>
                            </a>                            
                        @endforeach
                        </div>
                    @endif

                </div>
            </div>

            <div class="card mt-3">
                <input type="text" hidden="hidden" name="">
                <div class="card-header">Favourite Books</div>
                <div class="card-body TBooks">                    
                    @if (count($books) == 0)
                        This user doesn't have favourite movies.

                    @else

                        <div class="horizontal-scroll-container">
                         @foreach ($books as $book)
                        
                            <a class="searchThisB" href="/book/{{ $book->api_id }}">
                                <div name="book" id="{{ $book->api_id }}">
                                  <p name="name">{{$book->name_object}}</p>

                                   @if(strlen($book->image)>5)
                                    <img style="height: 120px;" src="{{$book->image}}" sr alt="image{{$book->name_object}}">
                                    @else
                                     <img style="height: 120px;" src="{{asset('images/defaultBook.png')}}" sr alt="image{{$book->name_object}}">
                                    @endif

                                </div>
                            </a>
                            
                        @endforeach
                        </div>                  

                    @endif
                </div>
            </div>

                         
      </div>
    </div>
  </div>           
</div> 
@endsection


