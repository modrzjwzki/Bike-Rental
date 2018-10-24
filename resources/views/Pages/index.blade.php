@extends('layout.layout')

@section('content') 
</div>
<div class="image-index" style="background-image:url({{url('/assets/stock2.jpg')}});">
    <h1>Najlepsza wypożyczalnia rowerów<br />
    Jaką udało mi się napisać teraz chyba.</h1>
</div>

<div class="container-fluid " >
    <div class="grid-container">
@foreach ($bikes as $bike) 
    <div class="bike-card grid-item">
    <img src="{{$bike->imageLink}}" class="bike-card-img">
    <h4 class="bike-card-name">{{ $bike->name }}</h4>
    <a href="bike/{{$bike->id}}" class="bike-card-view" >View</a>
    </div>

@endforeach
</div>

@endsection