@extends('layouts.pure')


    @section('content')

    <span><strong>Avatar:</strong> {{$artistData->avatar}}</span>
    <p><strong>Name:</strong> {{$artistData->name}}</p>
    <p><strong>About:</strong> {{$artistData->about}}</p>
    @stop

@stop
