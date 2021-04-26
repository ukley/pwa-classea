<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Colégio Classe A</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('/css/materialize/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{asset('/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

        <title>Laravel - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @laravelPWA
       
    </head>
    <body>

    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"> <img src="https://colegioclassea.com.br/centro/wp-content/uploads/sites/2/2021/03/logo-fundo-branco-editado.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

       <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="https://colegioclassea.com.br/centro/wp-content/uploads/sites/2/2020/11/conexao-167-1.jpg">
      </div>
      <a href="#user"><img class="circle" src="https://colegioclassea.com.br/centro/wp-content/uploads/sites/2/2021/02/BANNER-190.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>Principal</a></li>
    <li><a href="{{route('home')}}">Home</a></li>
    <li><a href="{{route('boletim')}}">Boletim Escolar</a></li>
    <li><a class="waves-effect" href="#!">Logout</a></li>

  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

        @yield('content')        


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{asset('/js/materialize.js')}}"></script>
  <script src="{{asset('/js/init.js')}}"></script>

  </body>
</html>
    </body>
</html>