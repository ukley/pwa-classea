<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Api\BaseController as BaseController;

use Illuminate\Http\Request;
use DB,Response;
use Exception;

class LoginController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function login(Request $request) {

 
        $login=$request->input('login');
        $senha=$request->input('senha');

        try{
 
        //$s=sha1($senha);
 
        //$foo=app('db')->connection('mysql')->select("SELECT * FROM estudantes WHERE login = '$login' && senha = '$s' && ativo = 's'");
 
        $foo=DB::connection('mysql_sistema')->select("SELECT m.idRegistro,m.idEstudante,m.idEscola,m.idSerie,m.idTurma,m.turno,m.ano,e.cpfResponsavel FROM estudantes e 
               INNER JOIN matricula m On m.idEstudante=e.idEstudante WHERE e.cpfResponsavel = $login && m.idRegistro=$senha && m.ano='2019'");
        }catch(Exception $e){
            return $e->getMessage();
        }
            if(empty($foo)){
                return response()->json('Matricula ou senha invalida.');
            };
                         
            //return $this->mostraPerfil($foo[0]->idRegistro);
            return response()->json($foo);

       }

       public function mostraPerfil($id){
           
	    $result=DB::connection('mysql_sistema')->select("SELECT estudantes.nome,estudantes.foto,m.idRegistro,m.idEstudante,e.nome as unidade,s.nome as serie,t.nome as turma FROM matricula m
			INNER JOIN estudantes ON estudantes.idEstudante=m.idEstudante
			INNER JOIN series s ON m.idSerie=s.idSerie
			INNER JOIN turmas t ON m.idTurma=t.idTurma
			INNER JOIN escolas e ON m.idEscola=e.idEscola
            WHERE m.ano=2019 && m.idRegistro=$id");       
            
            //return $this->setCookie($result);            
            
            return $this->sendResponse($result, 'Login com sucesso.'); 
       }

       public function setCookie($result){
             
        //return $request->cookie('nome');
     }


       public function sendResponse($result,$message)
       {

        $response=[
            'success'=> true,
            'data'   => $result,
            'message'=> $message
        ];

        if(empty($result)){
            return response()->json("Login vazio",400);
        }
    
        return response()->json($response,200);
    }

    public function sendError($error,$errorMessages = [], $code=404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response,$code);
    }    
    
}
