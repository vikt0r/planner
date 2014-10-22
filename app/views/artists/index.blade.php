@extends('layouts.pure')


    @section('content')
        <h1>Artists</h1>
        <table>
            <thead>
                <th>Avatar</th>
                <th>Name</th>
                <th>About</th>
            </thead>
            <tbody>
                    @foreach($artistsData as $artist)
                    <tr>
                        <td>{{$artist->avatar}}</td>
                        <td>{{$artist->name}}</td>
                        <td>{{$artist->about}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @stop

@stop
