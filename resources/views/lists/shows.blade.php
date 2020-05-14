@extends('layouts.app')
@section('links')
<link href="{{ asset('css/lists.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/tabslists.js') }}"></script>
<script type="text/javascript" src ="{{ asset('js/listMain.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
     	  
        	@guest
            	<h3><b>{{$username}}</b>'s show list</h3>
            @else

            	@php
            	$usernameLoggedIn = Auth::user()->name;
	            @endphp

	            @if($usernameLoggedIn==$username)
	            	 <h3><b>Your</b> show list</h3>
	            @else
	            	 <h3><b>{{$username}}</b>'s show list</h3>
	            @endif
        	 
        	@endguest
        
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
                	@php
                       $numberTop = 1;
                    @endphp
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col"></th>
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
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/show/{{ $allOne->api_id }}">{{$allOne->name_object}}</a></td>
						    <td>{{$allOne->season}}</td>
						    <td>{{$allOne->episode}}</td>
						    <td>{{$allOne->timemark}}</td>	
						    <td>{{$allOne->status}}</td>	
						    <td>{{$allOne->rating}}</td>
	                	</tr>
	                	@php
                            $numberTop =$numberTop+1;
                        @endphp
	                @endforeach
	                	</tbody>
					</table>
                @endif
			</div>

			<div id="Watching" class="tabcontent">
				@if (count($watching) == 0)
                    Your don't have anything.
                @else  
                	@php
                       $numberTop = 1;
                    @endphp
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col"></th>
					      <th scope="col">Name</th>
					      <th scope="col">Season</th>
					      <th scope="col">Episode</th>
					      <th scope="col">Timemark</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($watching as $watchingOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/show/{{ $watchingOne->api_id }}">{{$watchingOne->name_object}}</a></td>
						    <td>{{$watchingOne->season}}</td>
						    <td>{{$watchingOne->episode}}</td>
						    <td>{{$watchingOne->timemark}}</td>	
						    <td>{{$watchingOne->status}}</td>	
						    <td>{{$watchingOne->rating}}</td>
	                	</tr>
	                	@php
                            $numberTop =$numberTop+1;
                        @endphp
	                @endforeach
	                	</tbody>
					</table>
                @endif			  
			</div>

			<div id="Dropped" class="tabcontent">
				@if (count($dropped) == 0)
                    Your don't have anything.
                @else  
                	@php
                       $numberTop = 1;
                    @endphp
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col"></th>
					      <th scope="col">Name</th>
					      <th scope="col">Season</th>
					      <th scope="col">Episode</th>
					      <th scope="col">Timemark</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($dropped as $droppedOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/show/{{ $droppedOne->api_id }}">{{$droppedOne->name_object}}</a></td>
						    <td>{{$droppedOne->season}}</td>
						    <td>{{$droppedOne->episode}}</td>
						    <td>{{$droppedOne->timemark}}</td>	
						    <td>{{$droppedOne->status}}</td>	
						    <td>{{$droppedOne->rating}}</td>
	                	</tr>
	                	@php
                            $numberTop =$numberTop+1;
                        @endphp
	                @endforeach
	                	</tbody>
					</table>
                @endif
			  
			</div>

			<div id="Completed" class="tabcontent">
				@if (count($completed) == 0)
                    Your don't have anything.
                @else  
                	@php
                       $numberTop = 1;
                    @endphp
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col"></th>
					      <th scope="col">Name</th>
					      <th scope="col">Season</th>
					      <th scope="col">Episode</th>
					      <th scope="col">Timemark</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($completed as $completedOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/show/{{ $completedOne->api_id }}">{{$completedOne->name_object}}</a></td>
						    <td>{{$completedOne->season}}</td>
						    <td>{{$completedOne->episode}}</td>
						    <td>{{$completedOne->timemark}}</td>	
						    <td>{{$completedOne->status}}</td>	
						    <td>{{$completedOne->rating}}</td>
	                	</tr>
	                	@php
                            $numberTop =$numberTop+1;
                        @endphp
	                @endforeach
	                	</tbody>
					</table>
                @endif
			  
			</div>

			<div id="Plantowatch" class="tabcontent">
				@if (count($planToWatch) == 0)
                    Your don't have anything.
                @else  
                	@php
                       $numberTop = 1;
                    @endphp
                	<table class="table table-striped table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col"></th>
					      <th scope="col">Name</th>
					      <th scope="col">Season</th>
					      <th scope="col">Episode</th>
					      <th scope="col">Timemark</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($planToWatch as $planToWatchOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/show/{{ $planToWatchOne->api_id }}">{{$planToWatchOne->name_object}}</a></td>
						    <td>{{$planToWatchOne->season}}</td>
						    <td>{{$planToWatchOne->episode}}</td>
						    <td>{{$planToWatchOne->timemark}}</td>	
						    <td>{{$planToWatchOne->status}}</td>	
						    <td>{{$planToWatchOne->rating}}</td>
	                	</tr>
	                	@php
                            $numberTop =$numberTop+1;
                        @endphp
	                @endforeach
	                	</tbody>
					</table>
                @endif			  
			</div>
            

            
        </div>
    </div>
</div>
@endsection