@extends('layout.layout')

@section('content')
<div class="bike">
        <h1 class="bike-name">{{$name}}</h1>
    <div class="row">
        <div class="col-sm-9">
        
<img id="bike-image" src='{{$imageLink}}' class="bike-image img-fluid"  >
</div>
<div class="col-md-3">
    
   
    <div class="pull-right">
    @guest
    <div class="submit">
        log in to rent
    </div>
    @else
    
    @if ($availability > 0) 
    {!! Form::open(['method' => 'POST', 'route' => ['bikes.store'], 'autocomplete' =>
                            'off', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        {{ Form::hidden('Bike_Name', $name) }}
        {{ Form::hidden('Bike_id', $id) }}
        {{ Form::hidden('WhoRented', auth::user()->id) }}
        {{ Form::hidden('When', '') }}
        {{Form::submit('RENT',['class' => 'submit'])}}
    {!! Form::close() !!}   
    @else 
    @endif
    @endguest
    <div class="bike-availability">dostępnych sztuk: {{$availability}}</div>
    </div>
</div>
</div>

<div class="bike-description"><div class="bike-des">Description</div><div>{{$description}}</div></div>
<div class="bike-des">Specification</div>    
    <div class="row secification">
        
        <div class="col-sm"><div class="bike-DriveTrain"><img src="{{URL::asset('/assets/DRIVETRAIN.jpg')}}" class="spec-img"><div class="spec-name">DriveTrain</div> {{$DriveTrain}}</div></div>
        <div class="col-sm"><div class="bike-Brakes"><img src="{{URL::asset('/assets/BRAKES_DISC.jpg')}}" class="spec-img"><div class="spec-name">Brakes</div>  {{$Brakes}}</div></div>
        <div class="col-sm"><div class="bike-Crank"><img src="{{URL::asset('/assets/CRANK.jpg')}}" class="spec-img"><div class="spec-name">Crank</div>  {{$Crank}}</div></div>
        <div class="col-sm"><div class="bike-Crank"><img src="{{URL::asset('/assets/WHEEL_SET.jpg')}}" class="spec-img"><div class="spec-name">Wheelset</div> {{$Wheelset}}</div></div>
    </div>
</div>
@endsection