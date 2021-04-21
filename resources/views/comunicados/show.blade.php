@extends('layouts.app')

@section('content') 
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">                  
          <div class="icon-block">
             <h5 class="center" > {!!$post->title->rendered!!} </h5>

            <p class="light">
            {!!$post->content->rendered!!} </p>
          </div>
        </div>       
      </div>
    </div>
    <br><br>
  </div>

@endsection