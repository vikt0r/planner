@extends('layouts.master')


@section('content')

	{{ Form::open( array( 'route'=>'user.store', 'method'=>'post', 'id'=>'createuser' ) ) }}
		<div class="four columns alpha">
			  <label for="email">Email</label>
			  <input type="text" name="email" />
			  <label for="password">Password</label>
			  <input type="password" name="password" />
			  
			  {{ Form::submit('Register!') }}
		</div>
	
	
	{{ Form::close() }}

@stop


@section('footsection')

	{{ HTML::script('js/create.user.js') }}

@stop

