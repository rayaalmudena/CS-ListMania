@extends('layouts.app')

@section('links')
<script type="text/javascript" src="{{ asset('js/main/bookSearch.js') }}"></script>
<link href="{{ asset('css/detailsOb.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@guest
<script type="text/javascript" src="{{ asset('js/detail/book/main.js') }}"></script>
@else
<script type="text/javascript" src="{{ asset('js/detail/saveDeleteReviews.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/detail/book/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/detail/mainReview.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/detail/book/onChange.js') }}"></script>
@if(isset($saved))    
<script type="text/javascript">
  var val = <?php echo json_encode($saved); ?>;
</script>
<script type="text/javascript" src="{{ asset('js/detail/book/loadInfo.js') }}"></script>
@endif
@endguest
@endsection

@section('tittlePage', 'Book')

@section('content')
<div class="container" hidden>
  <div class="col-12"> 

    <div class="row">
      <div class="objectSearch" id="{{$idObject}}">
        <h1 class="title" id="title"></h1>
        
        <div class="row"> <!-- Image and text -->
          <div class="col-sm-3 col-md-3 col-xs-12 photoDiv">

            <img class="img-responsive img-thumbnail" id="photo" >
            <!--sidebar-->
            

            @guest
            @else       
            <div class="mt-3 col-12"> 
              <b >Options:</b>
            </div>

            <div class="input-group col-12">              

              <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text">Bookmark</span>
                </div>
                <input type="number" class="form-control" id="bookmark" value="" min="0" step="10" aria-label="bookmark" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text">Line</span>
                </div>
                <input type="number" class="form-control" id="line" value="" min="0" step="1" aria-label="line" aria-describedby="inputGroup-sizing-default">
              </div>                           


              <div class="input-group col-12 ">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="status">Rating</label>
                </div>
                <select class="custom-select" id="rating">
                  <option value="" selected>Choose...</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div> 

              <div class="input-group col-12 ">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="status">Status</label>
                </div>
                <select class="custom-select" id="status">
                  <option value="" selected>Choose...</option>
                  <option value="Watching">Reading</option>
                  <option value="Dropped">Droppped</option>
                  <option value="Completed">Completed</option>
                  <option value="Plan to watch">Plan to read</option>¡
                </select>
              </div>        

              <div class="input-group col-12 " style=" justify-content: center;">
                <input id="heart" type="checkbox" />
                <label style="font-size: 24px; " for="heart">❤</label>              
              </div>         

            </div>
            @endguest



          </div>
          <div class="col-sm-9 col-md-9 col-xs-12">
            <p class="textDiv text-left addContent">
            </p> 
            <div class="col-sm-3 col-md-3 col-xs-3" id="stats">
              <ul class="list-group ">
                <li class="list-group-item active" style="">Our stats:</li>
                <li class="list-group-item"><b>Rating: </b>
                  @if(isset($rating[0]->rating))
                  {{$rating[0]->rating}}
                  @else
                  0
                  @endif
                </li>
                <li class="list-group-item"><b>Total favourites: </b>
                  @if(isset($countFav[0]->sum))
                  {{$countFav[0]->sum}}
                  @else
                  0
                  @endif
                </li>
              </ul>          
            </div>           
          </div>


          <div class="col-sm-9 col-md-9 col-xs-12 mx-auto mt-5">
            <div class="card-header">Reviews <span style="float: right; color: white;"><a style="color: white;" href="{{ url('reviews/'.$idObject.'/book/new') }}">(See all)</a></span></div>
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
              @guest
              @else
              <br>
              <form action="/saveReview/books/{{$idObject}}" method="POST" role="formReview">
                @csrf
                <ul class="list-group bt-3">
                  <li class="list-group-item active" style="color: black !important; background-color: #eeebee; "><b>Write your review:</b></li>
                  <li class="list-group-item text-dark">
                    <div class="green-border-focus">
                      <label for="titleReview" style="margin-bottom: 0;">Title:</label>
                      <textarea class="form-control" name="titleReview" rows="1"></textarea>
                    </div>
                  </li>
                  <li class="list-group-item text-dark">
                    <div class="green-border-focus">
                      <label for="textReview" style="margin-bottom: 0;">Text:</label>
                      <textarea class="form-control" name="textReview" rows="3"></textarea>
                    </div>
                  </li>
                  <li class="list-group-item text-dark right"><button class="btn btn-primary float-right mt-1 mb-1" style="background-color: #E28413 ; border: 0PX; border-radius: 0px; " type="submit">Submit</button></li>                      
                </ul>
              </form>
              @endguest 
            </div> 
          </div>
        </div>
      </div>           
    </div> 
  </div>
</div>
@endsection


