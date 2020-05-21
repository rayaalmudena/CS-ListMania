@extends('layouts.app')

@section('links')
<script type="text/javascript" src="{{ asset('js/main/movieShowSearch.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main/bookSearch.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
<script type="text/javascript">
        var searched =" <?php echo $query; ?>";
</script>

@endsection

@section('content')

<div class="container" searched="{{ $query }}" >    
        <p id="success" style="font-size: 16px;"> The Search results for <b> {{ $query }} </b> are :</p>
    <div class="row search" style="float: left; ">
        @if(isset($details))
        @foreach($details as $object)
            <div  class="col-sm-2 col-md-2 col-xs-2 searchedItems" id="{{$object->api_id}}" type={{$object->type}}>
            @if($object->type=="movies")
                <a href="/movie/{{ $object->api_id }}">
            @elseif($object->type=="series")
                <a href="/show/{{ $object->api_id }}">
            @else
                <a href="/book/{{ $object->api_id }}">
            @endif                
                    <figure class="figure">
                      <img style="height: 200px;" src="{{$object->image}}" class="figure-img img-fluid rounded" alt="...">
                      <figcaption class="figure-caption">{{$object->title}}</figcaption>
                    </figure>
                </a>
            </div>
            
        @endforeach  
    </div>
    @else
       <p id="fail" class="p-3 mb-2 bg-danger text-white mx-auto" style="font-size: 16px;width: max-content;" hidden="hidden"> The Search for <b>{{ $query }}</b> was unsuccessful.</p> 
    @endif
</div>
@endsection