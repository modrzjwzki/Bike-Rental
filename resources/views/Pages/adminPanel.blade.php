@extends('layout.layout')

@section('title')
Bike Rental - Admin Panel
@endsection

@section('content')

@guest 

@else



<div class="admin-form">

    
<h1>Dodaj rower do katalogu</h1>
{!! Form::open(['method' => 'POST', 'route' => ['admin.store'], 'autocomplete' =>
                            'off', 'enctype' => 'multipart/form-data', 'class' => 'form-group']) !!}
        @csrf

        <div class="admin-inputs">
        {{ Form::hidden('created_at',date('Y-m-d H:i:s')) }}
        {{ Form::hidden('updated_at',date('Y-m-d H:i:s')) }}
        {{ Form::text('Name', 'Name') }}
        
        {{ Form::text('DriveTrain', 'DriveTrain') }}
        {{ Form::text('Brakes', 'Brakes') }}
        {{ Form::text('Crank', 'Crank') }}
        {{ Form::text('Wheelset', 'Wheelset') }}
        {{ Form::text('imageLink', 'imageLink') }}
        {{ Form::text('availability', 'availability') }}
        </div>
        
        {{ Form::textarea('description', 'description') }}
        <div style="clear:both"></div>
        {{Form::submit('dodaj do bazy danych',['class' => 'AddBikeToDB'])}}
        
    {!! Form::close() !!} 
    <br/>
</div>
    <h1>Dostępne rowery</h1>
    <table class="table bikes-a">
            <thead>
                    <tr>
                            <th scope="col">id</th>
                            <th scope="col"></th>
                            <th scope="col">Rower</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach ($bikes as $bike)
    <tr>
    <th scope="row">{{$bike->id}}</th>
            <td><img src="{{ $bike->imageLink }}" width="100"></td>
            <td><a href="{{ url('bike/'.$bike->id.'')}}">{{$bike->name}}</a></td>
            <td><a href="{{url('admin/delete/'.$bike->id.'')}}"><i class="material-icons">delete</i></a></td>
    </tr>
    
    
    @endforeach
</tbody>
</table>
    <h1>Wypożyczone rowery</h1>
    <table class="table">
    <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data dodania</th>
                <th scope="col">Rower</th>
                <th scope="col">Status</th>
                <th scope="col">R</th>
                <th scope="col">G</th>
                <th scope="col">W</th>
                <th scope="col">Z</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($rentedBikes as $rentedbike)
       
    <tr>
    <th scope="row">{{$rentedbike->id}}</th>
            <td>{{$rentedbike->created_at}}</td>
                    <td>{{$rentedbike->bikeName}} </td>
           @if ($rentedbike->STATUS === 0)
           <td>Nie wiadomo</td>
             @elseif ($rentedbike->STATUS === 1)
             <td> Przekazano do realizacji</td>
             @elseif ($rentedbike->STATUS === 2)
             <td> Gotowy do odbioru</td>
             @elseif ($rentedbike->STATUS === 3)
             <td>  Wypożyczony</td>
            @elseif ($rentedbike->STATUS === 4)
            <td> Zakończono</td>
            @endif
            <td> <a href="{{url('admin/status/'.$rentedbike->id.'/1')}}"><i class="material-icons">
                    autorenew
                    </i></a></td>
                <td><a href="{{url('admin/status/'.$rentedbike->id.'/2')}}"><i class="material-icons">
                        thumb_up
                        </i></a></td>
                    <td><a href="{{url('admin/status/'.$rentedbike->id.'/3')}}"><i class="material-icons">
                            flight_takeoff
                            </i></a></td>
                        <td><a href="{{url('admin/status/'.$rentedbike->id.'/4')}}"><i class="material-icons">
                                done
                                </i></a></td>
                            </tr>
        
    @endforeach
    </tbody>
        </table>
    </div><!-- continer close --> 
@endguest

@endsection