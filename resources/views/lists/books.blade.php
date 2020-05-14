@extends('layouts.app')
@section('links')
<link href="{{ asset('css/lists.css') }}" rel="stylesheet">
<script type="text/javascript" src ="{{ asset('js/tabslists.js') }}"></script>
<script type="text/javascript" src ="{{ asset('js/listMain.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
        	@guest
            	<h3 class="{{$userid}}"><b>{{$username}}</b>'s book list</h3>
            @else

            	@php
            	$usernameLoggedIn = Auth::user()->name;
	            @endphp

	            @if($usernameLoggedIn==$username)
	            	 <h3><b>Your</b> book list</h3>
	            @else
	            	 <h3><b>{{$username}}</b>'s book list</h3>
	            @endif
        	 
        	@endguest
        
			 <!-- Tab links -->
			<div class="tab">
			  <button class="tablinks" id="defaultOpen" onclick="openThis(event, 'All')">All</button>
			  <button class="tablinks" onclick="openThis(event, 'Watching')">Reading</button>
			  <button class="tablinks" onclick="openThis(event, 'Dropped')">Dropped</button>
			  <button class="tablinks" onclick="openThis(event, 'Completed')">Completed</button>
			  <button class="tablinks" onclick="openThis(event, 'Plantowatch')">Plan to read</button>
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
					      <th scope="col">Bookmark</th>
					      <th scope="col">Line</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($all as $allOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/book/{{ $allOne->api_id }}">{{$allOne->name_object}}</a></td>
						    <td>{{$allOne->bookmark}}</td>	
						    <td>{{$allOne->line}}</td>	
						    <td>@if($allOne->status=="Plan to watch")
						    	Plant to read
						    	@elseif($allOne->status=="Watching")
						    	Reading
						    	@else
						    		{{$allOne->status}}
						    	@endif

						    	</td>	
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
					      <th scope="col">Bookmark</th>
					      <th scope="col">Line</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($watching as $watchingOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/book/{{ $watchingOne->api_id }}">{{$watchingOne->name_object}}</a></td>
						    <td>{{$watchingOne->bookmark}}</td>	
						    <td>{{$watchingOne->line}}</td>	
						    <td>Reading</td>	
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
					      <th scope="col">Bookmark</th>
					      <th scope="col">Line</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($dropped as $droppedOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/book/{{ $droppedOne->api_id }}">{{$droppedOne->name_object}}</a></td>
						    <td>{{$droppedOne->bookmark}}</td>	
						    <td>{{$droppedOne->line}}</td>	
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
					      <th scope="col">Bookmark</th>
					      <th scope="col">Line</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($completed as $completedOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/book/{{ $completedOne->api_id }}">{{$completedOne->name_object}}</a></td>
						    <td>{{$completedOne->bookmark}}</td>	
						    <td>{{$completedOne->line}}</td>
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
					      <th scope="col">Bookmark</th>
					      <th scope="col">Line</th>
					      <th scope="col">Status</th>
					      <th scope="col">Rating</th>
					    </tr>
					  </thead>
					  <tbody>
	                 @foreach ($planToWatch as $planToWatchOne)
	                 	<tr>
						    <th score="row">{{$numberTop}}</th>
						    <td><a href="/book/{{ $planToWatchOne->api_id }}">{{$planToWatchOne->name_object}}</a></td>
						    <td>{{$planToWatchOne->bookmark}}</td>	
						    <td>{{$planToWatchOne->line}}</td>	
						    <td>Plan to read</td>	
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
