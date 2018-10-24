@extends('layout.layout')


@section('title')
    Bike Rental - Your Bikes
@endsection

@section('content')
<style>
.whenRented {
    display: inline-block;
}
</style>
<br/>

<h1>Wypożyczone</h1>
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Rent day</th>
            <th scope="col">expiry date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
    
      
        <tbody>
@foreach ($rentedBikes as $key =>$rentedBike ) 

        <th scope="row">{{$key + 1}}</th>
<td> <a href="bike/{{$rentedBike->whatBike}}">{{ $rentedBike->bikeName }}</a></td>
<td><div class="whenRented">{{$rentedBike->whenRented}}</div></td>
<td> <div class="whenRented">{{$rentedBike->whenEnd}}</td>
    <td> <div class="status">  
        @if ($rentedBike->STATUS === 0)
            Nie wiadomo
        @elseif ($rentedBike->STATUS === 1)
            Przekazano do realizacji
        @elseif ($rentedBike->STATUS === 2)
            Gotowy do odbioru
        @elseif ($rentedBike->STATUS === 3)
            Wypożyczony
        @elseif ($rentedBike->STATUS === 4)
            Zakończono
        @endif
    </div></td>
    
</div>
</tbody>
@endforeach
</table>

@endsection