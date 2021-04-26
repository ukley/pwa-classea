<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/happily-colored-snlogo/128/medium.png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- My CSS -->

  </head>
  <body>
   
	<div class="had-container">

	    	<div class="container" style="margin-top:90px;">
		<div class="row">
			<div class="col s12 m6 offset-m3">
			
			
		<div class="card-panel z-depth-5">
        		<h4 class="center"> <img src="https://colegioclassea.com.br/centro/wp-content/uploads/sites/2/2021/03/logo-fundo-branco-editado.png"></h4>	 

		<h4 class="center"> Colégio Classe A</h4>	 
<div class="row">
  <form class="col s12 m12" action="{{route('login')}}" method="POST">
    <div class="row">
      <div class="input-field col s12 m12">
        <i class="mdi-action-account-circle prefix"></i>
        <input id="icon_prefix" type="text" name="login" class="validate">
        <label for="icon_prefix">Login</label>
      </div>
      
    
        <div class="input-field col s12 m12">
        <i class="fa fa-unlock-alt prefix"></i>
        <input id="icon_password" type="password" name="senha" class="validate">
        <label for="icon_password">Senha</label>
      </div>
    
        
    </div>
   
</div><!--row-->

 <button class="btn waves-effect waves-light center" type="submit">Iniciar
    <i class="fa fa-sign-in right"></i>
  </button>
</div>

  </form>



</div><!--col-->
  </div><!--row-->
	</div><!--conatiner-->
    

    </div> <!-- fin del .container -->



    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="mySpxript.js"></script>
  </body>
</html>