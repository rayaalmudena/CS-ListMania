@extends('layouts.app')

@section('links')

<script type="text/javascript" src="{{ asset('js/main/movieShowSearch.js') }}"></script>
<link href="{{ asset('css/detailsOb.css') }}" rel="stylesheet"> 

@guest
  <script type="text/javascript" src="{{ asset('js/detail/movieShow/main.js') }}"></script>
  @else
    <script type="text/javascript" src="{{ asset('js/detail/movieShow/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/detail/movieShow/onChange.js') }}"></script>
    @if(isset($saved))    
      <script type="text/javascript">
        var val = <?php echo json_encode($saved); ?>;
      </script>
      <script type="text/javascript" src="{{ asset('js/detail/movieShow/loadInfo.js') }}"></script>
    @endif
  @endguest
@endsection



@section('content')
<div class="container ">
  <div class="col-12">    
  
    <div class="row">
      <div class="objectSearch" id="{{$idObject}}">
        <h1 class="title" id="title"></h1>
        
        <div class="row"> <!-- Image and text -->
          <div class="col-sm-3 col-md-3 col-xs-12 photoDiv">

            <!--sidebar-->
            <img class="img-responsive img-thumbnail" id="photo" />

            @guest
            @else       
            <div class="mt-3 col-12"> 
              <b >Options:</b>
            </div>

            <div class="input-group col-12">
              @if(Request::is('show/*'))

              <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Season</span>
                </div>
                <input type="number" class="form-control" id="season" value="" min="0" step="1" aria-label="season" aria-describedby="inputGroup-sizing-default">
              </div>

               <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Episode</span>
                </div>
                <input type="number" class="form-control" id="episode" value="" min="0" step="1" aria-label="episode" aria-describedby="inputGroup-sizing-default">
              </div>
                  
              @endif

              <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Timemark</span>
                </div>
                <input type="number" class="form-control" id="timemark" value="" min="0" step="1" aria-label="timemark" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Rating</span>
                </div>
                <input type="number" id="rating" value="" min="0" max="10" step="1" class="form-control" aria-label="ranking" aria-describedby="inputGroup-sizing-default">
              </div>

            
              <div class="input-group col-12 ">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="status">Status</label>
                </div>
                <select class="custom-select" id="status">
                  <option value="" selected>Choose...</option>
                  <option value="Watching">Watching</option>
                  <option value="Droppped">Droppped</option>
                  <option value="Completed">Completed</option>
                  <option value="Plan to watch">Plan to watch</option>¡
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
            <div class="col-sm-3 col-md-4 col-xs-6" id="stats">
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
        </div>
      </div>           
    </div> 
  </div>
</div>



@endsection