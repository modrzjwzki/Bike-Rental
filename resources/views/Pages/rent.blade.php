@extends('layout.layout')


@section('content') 

@guest 

@else
<div class="Bike-rented">Rower został wypożyczony</div>
@endguest

@endsection