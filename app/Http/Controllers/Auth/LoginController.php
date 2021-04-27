<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
     


    public function appLogin(){
        $detect = new \Mobile_Detect; 

        if ($detect->isMobile())  
        {           
                return view('login');
            
        }
        else 
        {
            return 'Você não está usando um dispositivo móvel'; //imprima "Você não está utilizando um dispositivo móvel"
        }


    }

    public function login(Request $request) {

        $client = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:9090']);       
       
        $response=$client->request('POST', '/login', [
            'form_params' => [
                //'login' => 'cunha',
                //'senha' => '58996540072'
                'login' => $request->input('login'),
                'senha' => $request->input('senha')
            ]
        ]);                   
        
        $data = json_decode($response->getBody(), true); // returns an array
       

        if(($data['auth']))
        {
            setcookie("token", $data['token']);  
            setcookie("matricula", $data['matricula']);       
          
        }        
        return view('home');
                           
    }

       public function mostraPerfil($id){
           
	    $result=DB::connection('mysql_sistema')->select("SELECT estudantes.nome,estudantes.foto,m.idRegistro,m.idEstudante,e.nome as unidade,s.nome as serie,t.nome as turma FROM matricula m
			INNER JOIN estudantes ON estudantes.idEstudante=m.idEstudante
			INNER JOIN series s ON m.idSerie=s.idSerie
			INNER JOIN turmas t ON m.idTurma=t.idTurma
			INNER JOIN escolas e ON m.idEscola=e.idEscola
            WHERE m.ano=2019 && m.idRegistro=$id");                 
                             
            return $this->sendResponse($result, 'Login com sucesso.'); 
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

    function isMobile() {
    }  
        
    }
