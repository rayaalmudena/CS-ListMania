@extends('layouts.app')

@section('links')
<link href="{{ asset('css/detailsOb.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
  @guest
  @else
  <script type="text/javascript" src="{{ asset('js/detail/saveDeleteReviews.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/detail/mainReview.js') }}"></script>
  @endguest
@endsection

@section('tittlePage', 'Reviews '.$title[0]->title )
@section('styles')
#title > a:hover{
  text-decoration:none;
  color:#746d75 !important;
}
@endsection

@section('content')
<div class="container ">
  <div class="col-12"> 

    <div class="row">
      <div class="objectSearch" id="{{$idObject}}">
        <h1 class="title" id="title"><a href="{{ url($type.'/'.$idObject) }}" style="color: white;">{{$title[0]->title}}</a></h1>
        
        <div class="row"> <!-- Image and text --> 

          <div class="col-sm-9 col-md-9 col-xs-12 mx-auto mt-2">
            <div class="card-header">All reviews<span style="float: right">Order by:
              <select onchange="if (this.value) window.location.href=this.value">
                <option <?php if ($order=="new"): ?>selected  <?php endif ?> value="/reviews/{{$idObject}}/{{$type}}/new">New</option>
                <option <?php if ($order=="top"): ?>selected  <?php endif ?> value="/reviews/{{$idObject}}/{{$type}}/top">Top</option>
              </select></span></div>
            <div class="card-body tMovies">
              @if($reviews)              
              @guest
              @foreach($reviews as $review)
              <ul class="list-group mb-1">
                <li class="list-group-item active" style="color: black !important; background-color: #eeebee; "><b>User: </b>{{$review->name}}&emsp;{{$review->updated_at}}</li>
                <li class="list-group-item text-dark" style="padding-top: 8px;"><b>{{$review->title}}</b>                     
                </li>
                <li class="list-group-item text-dark">{{$review->text}}</li>
                <li class="list-group-item">
                  <div class="input-group col-12 " style=" justify-content: center;">
                    <label class="fas fa-thumbs-up" style="font-size: 16px; color: grey;">{{$review->likes}}</label>              
                  </div> 
                </li>
              </ul>                    
              @endforeach
              @else
              @foreach($reviews as $review)
              <ul class="list-group mb-1">
                <li class="list-group-item active" style="color: black !important; background-color: #eeebee; "><b>User: </b>{{$review->name}}&emsp;{{$review->updated_at}}</li>
                <li class="list-group-item text-dark" style="padding-top: 8px;"><b>{{$review->title}}</b>                     
                </li>
                <li class="list-group-item text-dark">{{$review->text}}</li>
                <li class="list-group-item thumbLike" idreview="{{$review->id}}">
                  <div class="input-group col-12 " style=" justify-content: center;">
                    <input id="thumb" type="checkbox" />
                    @if(isset($review->userlike))
                    <label class="fas fa-thumbs-up" style="font-size: 16px; color: green;" for="thumb">{{$review->likes}} </label>
                    @else
                    <label class="fas fa-thumbs-up" style="font-size: 16px; color: grey;" for="thumb">{{$review->likes}} </label>
                    @endif
                  </div> 
                </li>
              </ul> 
              @endforeach
              @endguest
              @else              
              There are not reviews for this.              
              @endif              
            </div> 
          </div>
        </div>
      </div>           
    </div> 
  </div>
</div>
@endsection


