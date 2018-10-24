@extends('layout.layout')


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
        <div style="clear:both"/>
        {{Form::submit('dodaj do bazy danych',['class' => 'AddBikeToDB'])}}
        
    {!! Form::close() !!} 
    <br/>
</div>
    <h1>dostępne rowery</h1>
    @foreach ($bikes as $bike)
    <div>
        
    <a href="{{ url('bike/'.$bike->id.'')}}">{{$bike->name}}</a><a href="{{url('admin/delete/'.$bike->id.'')}}">Delte</a>
    

    <br/>
    
    </div>
    @endforeach
    <h1>Wypożyczone rowery</h1>
    @foreach ($rentedBikes as $rentedbike)
       <div>
           {{$rentedbike->created_at}}
           {{$rentedbike->bikeName}} 
           @if ($rentedbike->STATUS === 0)
                Nie wiadomo
             @elseif ($rentedbike->STATUS === 1)
                Przekazano do realizacji
             @elseif ($rentedbike->STATUS === 2)
                Gotowy do odbioru
             @elseif ($rentedbike->STATUS === 3)
                Wypożyczony
            @elseif ($rentedbike->STATUS === 4)
             Zakończono
            @endif
            <a href="{{url('admin/status/'.$rentedbike->id.'/1')}}">Przekazano do realizacji</a>
            <a href="{{url('admin/status/'.$rentedbike->id.'/2')}}">Gotowy do odbioru</a>
            <a href="{{url('admin/status/'.$rentedbike->id.'/3')}}">Wypożyczony</a>
            <a href="{{url('admin/status/'.$rentedbike->id.'/4')}}">Zakończono</a>
        </div>
    @endforeach

@endguest

@endsection