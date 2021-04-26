<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PerfilController extends Controller
{
    public function mostraPerfil($id){
	    $bol=DB::connection('mysql_sistema')->select("SELECT estudantes.nome,estudantes.foto,m.idRegistro,m.idEstudante,e.nome as unidade,s.nome as serie,t.nome as turma FROM matricula m
			INNER JOIN estudantes ON estudantes.idEstudante=m.idEstudante
			INNER JOIN series s ON m.idSerie=s.idSerie
			INNER JOIN turmas t ON m.idTurma=t.idTurma
			INNER JOIN escolas e ON m.idEscola=e.idEscola
			WHERE m.ano=2019 && m.idRegistro=$id");

    return response()->json([$bol]);
    }


    public function boletim(){  

        //getCookie(idEstudante);

        /*      
        

        $bol=DB::connection('mysql_sistema')->select("SELECT estudantes.nome,estudantes.foto,m.idRegistro,m.idEstudante,e.nome as unidade,s.nome as serie,t.nome as turma FROM matricula m
        INNER JOIN estudantes ON estudantes.idEstudante=m.idEstudante
        INNER JOIN series s ON m.idSerie=s.idSerie
        INNER JOIN turmas t ON m.idTurma=t.idTurma
        INNER JOIN escolas e ON m.idEscola=e.idEscola
        WHERE estudantes.cpf=58996540072");
        dd($bol);*/

        $client = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:9090']);       
       
        $response=$client->request('POST', '/boletim', [
            'form_params' => [
                //'login' => 'cunha',
                //'senha' => '58996540072'
                'escola' => 1,
                'idSerie' => 53,
                'turma'   => 504,
                'turno'   => 'v',
                'matricula' => 24133,
                'cpf' => '91206383020',
                'bimestre'=>'1'
            ]
        ]);        
        $html=$response->getBody(true)->getContents();      
        return $html;
       
    }             
         
}
