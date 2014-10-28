@extends('layouts.master')


@section('content')
	<div class="five columns alpha">
			  <h4 >Title</h4>
	</div>
	<div class="five columns alpha">
		  <h4 >Artist</h4>
	</div>
	<div class="five columns alpha">
		<h4 >Album</h4>
	</div>

	@foreach($gaans as $g)
	  	<div class="five columns alpha">
	  		<em>{{$g->title}}</em>
  		</div>
	  	<div class="five columns alpha">
	  		<span>{{$g->artist->name}}</span>
	  	</div>
	  	<div class="five columns alpha">
	  		<strong>{{$g->album->name}}</strong>
	  	</div>
	@endforeach

@stop