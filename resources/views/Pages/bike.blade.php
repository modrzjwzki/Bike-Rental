@extends('layout.layout')

@section('title')
  Bike Rental - {{$name}}
@endsection

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
    <input type="button" value="RENT" id="submit" class="submit"> 
    @else 
    @endif
    @endguest
    <div class="bike-availability">dostępnych sztuk: {{$availability}}</div>
    </div>
</div>
</div>


 <!-- The Modal -->
 <div id="myModal" class="modal">
 
   <!-- Modal content -->
   <div class="modal-content">
     
     @guest
  
    @else
     @if ($availability > 0) 
    <h3 class="terms">terms and services</h3>
    <div class="terms-content">
        

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi auctor ex quis iaculis rutrum. Donec accumsan egestas malesuada. Sed vel orci placerat, suscipit risus ac, tristique ipsum. Nam eu semper erat. Ut et ipsum sed lectus sollicitudin elementum et quis felis. Maecenas maximus, mauris ac suscipit vulputate, enim felis viverra erat, eget pretium nunc augue eget libero. Fusce malesuada libero sed odio lacinia venenatis. Donec aliquet diam magna, ac venenatis enim venenatis id. Quisque rhoncus lorem nibh, ac lacinia purus sagittis sed. Morbi in dolor iaculis, egestas dui vitae, finibus est. Curabitur tempor dolor vel sem bibendum rutrum. Fusce malesuada orci ac iaculis commodo. Nulla bibendum consectetur semper. Sed id orci lacus. Vestibulum auctor commodo mi, gravida tempus ante ultrices eu. Nulla in sollicitudin magna.<br /><br />

Praesent semper nisl id finibus dictum. Vestibulum id quam sodales, faucibus lectus nec, ullamcorper enim. Vivamus convallis, arcu vel interdum mattis, est tortor condimentum neque, eu placerat leo ante quis felis. Aliquam sit amet laoreet nisl, sit amet imperdiet tortor. Cras cursus ornare dui ultricies sollicitudin. Quisque vel porta arcu. Nam viverra, nisi in auctor pellentesque, est erat fringilla sem, quis vulputate magna lacus eu nisl. Integer quis semper sapien. Aenean non condimentum nisl, nec hendrerit neque. Duis ante dui, volutpat id vehicula vel, porta et nibh. Aliquam nunc elit, porttitor ut magna eget, euismod efficitur nisl. Vestibulum pharetra tortor dignissim urna vestibulum malesuada. Etiam venenatis felis est, eget facilisis purus efficitur ac. Integer auctor in massa a dignissim.<br /><br />

Sed imperdiet scelerisque libero, eu condimentum elit hendrerit pellentesque. Vivamus id aliquam tellus. Aliquam erat volutpat. Etiam non tortor fringilla, aliquet urna at, congue nulla. Ut ipsum libero, condimentum eget velit sit amet, bibendum posuere dolor. Cras rutrum ac purus sit amet feugiat. Quisque ut tellus in felis consectetur scelerisque et sit amet ligula. Sed justo massa, malesuada vel dapibus dignissim, scelerisque ac elit. Curabitur pellentesque ipsum ac dui varius rutrum. Phasellus quis felis vel lacus feugiat rhoncus eu id lacus. Suspendisse vel volutpat est. Sed dictum dignissim aliquet. Morbi dictum, mauris aliquet vulputate hendrerit, nisl leo efficitur massa, ac auctor diam dui in velit. Pellentesque ornare cursus mattis.<br /><br />

In commodo id neque vel ornare. Donec ornare tempor diam ac aliquam. Fusce tincidunt, nibh id tempus interdum, dui libero hendrerit velit, vel volutpat orci urna ut turpis. Donec sit amet sapien eget elit malesuada facilisis. Sed justo mi, volutpat vel sem vel, tincidunt gravida lacus. Proin lorem libero, convallis non massa eget, porttitor sollicitudin turpis. Cras vitae ex eget urna dictum condimentum id ac eros.<br /><br />

Suspendisse viverra, dolor at elementum aliquam, turpis leo varius augue, quis fermentum nunc velit ac erat. Integer dictum quam nec nunc vulputate sagittis. Nullam vulputate felis sit amet augue finibus, nec tempus tortor fringilla. Vestibulum nec ex sed risus mattis blandit quis sed sem. Nullam nunc enim, tempor tincidunt ultrices quis, hendrerit pellentesque turpis. Nulla feugiat leo in risus blandit auctor. Nulla id lacinia augue, sit amet ultricies purus. <br /><br />

    </div>
    <hr>
    {!! Form::open(['method' => 'POST', 'route' => ['bikes.store'], 'autocomplete' =>
                            'off', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        {{ Form::hidden('Bike_Name', $name) }}
        {{ Form::hidden('Bike_id', $id) }}
        {{ Form::hidden('WhoRented', auth::user()->id) }}
        {{ Form::hidden('When', '') }}
       
        
        {{Form::submit('Potwierdz',['class' => 'rent'])}}
        <input type="button" class="close" value="Anuluj">
    {!! Form::close() !!}   
    
    @else 
    @endif
    @endguest
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


<script>

var modal = document.getElementById('myModal');


var btn = document.getElementById("submit");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} 
    </script>
@endsection