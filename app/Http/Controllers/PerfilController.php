<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function boletim(Request $request){

        /*
        $escola=$request->input('escola');
        $idserie=$request->input('serie');
        $turma=$request->input('turma');
        $turno=$request->input('turno');
        $matricula=$request->input('matricula');
        $cpf=$request->input('cpf');
        $bimestre=$request->input('bimestre');
        */
        $escola=1;
        $idserie=53;
        $turma=504;
        $turno="v";
        $matricula=24133;
        $cpf="91206383020";
        $bimestre=1;

        $client = new \GuzzleHttp\Client(['base_uri' => 'http://206.81.10.115/']);       
       
        $response = $client->request('GET', "/relBoletimPorEstudante.php?escola=$escola&serie=$idserie&turma=$turma&turno=$turno&matricula=$matricula&cpf=$cpf&bimestre=$bimestre");

        $body=$response->getBody();        
               
        return $body;

   }       
}
