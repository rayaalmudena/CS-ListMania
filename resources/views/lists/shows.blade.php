@extends('layouts.app')
@section('links')
<link href="{{ asset('css/lists.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/tabslists.js') }}"></script>

@guest
	<script type="text/javascript" src ="{{ asset('js/listMain.js') }}"></script>
	@else
		@php
			$usernameLoggedIn = Auth::user()->name;
	    @endphp
	    @if($usernameLoggedIn==$username)
	    	<script type="text/javascript" src="{{ asset('js/main/movieShowSearch.js') }}"></script>
	    	<script type="text/javascript" src="{{ asset('js/main/bookSearch.js') }}"></script>
	    	<script type="text/javascript" src ="{{ asset('js/listUser.js') }}"></script>
	    	<script type="text/javascript" src ="{{ asset('js/onChangeList.js') }}"></script>
	    @else
	    	<script type="text/javascript" src ="{{ asset('js/listMain.js') }}"></script>
	    @endif 
	@endguest
@endsection
@section('tittlePage', $username .' Shows List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
     	  
        	@if( isset($usernameLoggedIn) && $usernameLoggedIn==$username)
				<h3><b>Your</b> movie list</h3>
			@else
				<h3><b>{{$username}}</b>'s show list</h3>
			@endif
        
			 <!-- Tab links -->
			<div class="tab">
			  <button class="tablinks" id="defaultOpen" onclick="openThis(event, 'All')">All</button>
			  <button class="tablinks" onclick="openThis(event, 'Watching')">Watching</button>
			  <button class="tablinks" onclick="openThis(event, 'Dropped')">Dropped</button>
			  <button class="tablinks" onclick="openThis(event, 'Completed')">Completed</button>
			  <button class="tablinks" onclick="openThis(event, 'Plantowatch')">Plan to watch</button>
			</div>

			<!-- Tab content -->
			<div id="All" class="tabcontent">
			  	@if (count($all) == 0)
                    Your don't have anything.
                @else  
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Season</th>
					      <th scope="col">Episode</th>
					      <th scope="col">Timemark</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($all as $allOne)

	                 	@if(isset($usernameLoggedIn) && $usernameLoggedIn==$username)
	                 		<tr class="{{ $allOne->api_id}}">						    
									<td><a href="/show/{{ $allOne->api_id }}" name="title">{{$allOne->name_object}}</a></td>
									<td><input type="number" value="{{$allOne->season}}" name="season" min="0" step="1"></td>
									<td><input type="number" value="{{$allOne->episode}}" name="episode" min="0" step="1"></td>		
									<td><input type="text" value="{{$allOne->timemark}}" name="timemark"></td>	
									<td class="status" status="{{$allOne->status}}">
										<select class="custom-select" name="status">
								                  <option value="" selected>Choose...</option>
								                  <option value="Watching">Watching</option>
								                  <option value="Dropped">Droppped</option>
								                  <option value="Completed">Completed</option>
								                  <option value="Plan to watch">Plan to watch</option>
								        </select>
								     </td>	
									<td class="rating" rating="{{$allOne->rating}}">
						                <select class="custom-select" name="rating">
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
							         </td>
									<td hidden="hidden"><input type="number" value="{{$allOne->favourite}}" name="fav"></td>
								</tr>							
						@else
							<tr class="{{ $allOne->api_id}}">
							    <td><a href="/show/{{ $allOne->api_id }}">{{$allOne->name_object}}</a></td>
							    <td>{{$allOne->season}}</td>
							    <td>{{$allOne->episode}}</td>
							    <td>{{$allOne->timemark}}</td>	
							    <td class="status">{{$allOne->status}}</td>	
							    <td>{{$allOne->rating}}</td>						    
	                		</tr>
						@endif
	                 	
	                @endforeach
	                	</tbody>
					</table>
                @endif
			</div>
        </div>
    </div>
</div>
@endsection