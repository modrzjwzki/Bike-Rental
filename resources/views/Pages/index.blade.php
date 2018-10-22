@extends('layout.layout')

@section('content') 

@foreach ($bikes as $bike) 
    <div class="bike-card">
    <h3><a href="bike/{{$bike->id}}">{{ $bike->name }}</a></h3>

    </div>
@endforeach

@endsection