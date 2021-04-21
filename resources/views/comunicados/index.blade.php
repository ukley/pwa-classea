@extends('layouts.app')

@section('content')

 

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">

        @foreach($posts as $value)
          
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <a href="{{route('comunicado',[$value->id])}}"> <h5 class="center" > {!!$value->title->rendered!!} </h5></a>

            <p class="light">{!!$value->excerpt->rendered!!} </p>
          </div>
        </div>

        @endforeach

       

   
      </div>

    </div>
    <br><br>
  </div>

@endsection