@extends('layouts.bootstrap')

@section('content')
    <p>ERROR: {{ $errMsg }}</p>
    <p>DEBUG: <pre>' {{ $debugMsg }}'</pre></p>
@end

