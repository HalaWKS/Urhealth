@extends('app')
@section('content')
    @if($name == 'CR7')
<h1>About me {{$name}} </h1>

@else
    <h1>else</h1>
@endif

@stop
