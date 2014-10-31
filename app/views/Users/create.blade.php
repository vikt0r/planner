@extends('layouts.bootstrap')



@section('content')

	{{ Form::open( array( 'route'=>'users.store', 'method'=>'post', 'id'=>'createuser' ) ) }}
		<div class="four columns alpha">
			  <label for="email">Email</label>
			  <input type="text" name="email" />
			  <label for="password">Password</label>
			  <input type="password" name="password" />

			  {{ Form::submit('Register!') }}
		</div>


	{{ Form::close() }}

@show



