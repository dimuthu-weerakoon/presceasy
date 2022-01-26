@extends('layouts.customer')

@section('main-content')


<h1>uploaded prescriptions</h1>
<br>
 @if (count($prescs) > 0)
    
     @foreach ($prescs as $presc)
     <div class="card">
        <div class="card-header">
          {{$presc->created_at}}
        </div>
     </div>
         @endforeach

         @else
             <p>No prescriptions</p>   
         @endif




@endsection