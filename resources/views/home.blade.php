@extends('layouts.app')

@section('links')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/main/movieShowSearch.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main/bookSearch.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Top 10 Movies</div>
                <div class="card-body tMovies">
                    @if (count($movies) == 0)
                            Your users didn't rank any movie yet.
                    @else
                        
                         @php
                            $numberTop = 1;
                        @endphp

                        <div class="horizontal-scroll-container">
                         @foreach ($movies as $movie)
                            <a  class="searchThisMS" href="/movie/{{ $movie->api_id }}">
                                <div name="movie" id="{{ $movie->api_id }}">                                    
                                    <p name="{{$movie->name_object}}">
                                        Top {{$numberTop}}:<br> 
                                        {{$movie->name_object}}</p>
                                    <img style="height: 120px;" src="{{$movie->image}}" sr alt="image{{$movie->name_object}}">
                                </div>
                            </a> 
                            @php
                                $numberTop =$numberTop+1;
                            @endphp
                        @endforeach
                        </div>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Top 10 Shows</div>
                <div class="card-body tShows">                    
                    @if (count($shows) == 0)
                        Your users didnt rank any show yet.
                    @else
                        
                        @php
                            $numberTop = 1;
                        @endphp

                        <div class="horizontal-scroll-container">
                         @foreach ($shows as $show)
                            <a class="searchThisMS" href="/show/{{ $show->api_id }}">
                                <div name="show" id="{{ $show->api_id }}">
                                    Top {{$numberTop}}:<br>
                                    <p name="name">{{$show->name_object}}</p>
                                    <img style="height: 120px;" src="{{$show->image}}" alt="image{{$show->name_object}}">
                                </div>
                            </a> 
                            @php
                                $numberTop =$numberTop+1;
                            @endphp
                        @endforeach
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <input type="text" hidden="hidden" name="">
                <div class="card-header">Top 10 Books</div>
                <div class="card-body TBooks">                    
                    @if (count($books) == 0)
                        Your users didn't rank any book yet.

                    @else

                        @php
                            $numberTop = 1;
                        @endphp

                        <div class="horizontal-scroll-container">
                         @foreach ($books as $book)
                        
                            <a class="searchThisB" href="/book/{{ $book->api_id }}">
                                <div name="book" id="{{ $book->api_id }}">
                                   Top {{$numberTop}}:<br>
                                    <p name="name">{{$book->name_object}}</p>
                                    <img style="height: 120px;" src="{{$book->image}}" alt="image{{$book->name_object}}">
                                </div>
                            </a>
                            @php
                                $numberTop =$numberTop+1;
                            @endphp
                        @endforeach
                        </div>                  

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection