@extends('layouts.master')


@section('content')

	{{ Form::open( array( 'route'=>'gaan.store', 'method'=>'post', 'id'=>'creategaan', 'enctype'=>'multipart/form-data' ) ) }}
		<div class="four columns alpha">
			  <label for="gaan">Gaan</label>
			  <input type="file" name="gaan" />
			  {{ Form::submit('Store!') }}
		</div>
		<div class="six columns omega">
			  <label for="title">Title</label>
			  <input type="text" name="title" />

			  <label for="trackno">Track</label>
			  <input type="text" name="trackno" />

			  <label for="artist">Artist</label>
			  <input type="text" name="artist" />

			  <label for="album">Album</label>
			  <input type="text" name="album" />

			  <label for="genre">Genre</label>
			  <input type="text" name="genre" />
			  <label for="year">Year</label>
			  <input type="text" name="year" />
		</div>
		<div class="six columns">
			<label >Band</label>
		  	<input type="text" name="band" />

			<label >Composer</label>
			<input type="text" name="composer" />

			<label >Publisher</label>
			<input type="text" name="publisher" />
		</div>

	{{ Form::close() }}

@stop


@section('footsection')

	{{ HTML::script('js/create.gaan.js') }}
	{{ HTML::script('js/lib/jdataview.js') }}
	{{ HTML::script('js/lib/id3.min.js') }}

@stop

