@extends('layout.layout')

@section('content')
<div class="bike">
    <h1 class="bike-name">{{$name}}</h1>
    <div class="bike-description">{{$description}}</div>
    <div class="bike-DriveTrain">{{$DriveTrain}}</div>
    <div class="bike-Brakes">{{$Brakes}}</div>
    <div class="bike-Crank">{{$Crank}}</div>
    <div class="bike-imageLink">{{$imageLink}}</div>
</div>
@endsection