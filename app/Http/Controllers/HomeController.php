<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
  
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://colegioclassea.com.br/centro/wp-json/wp/v2/posts?categories=11');        
        $body=$response->getBody(); 
        $posts = json_decode(($body)->getContents());
        return view('comunicados.index',compact('posts'));
    }


public function show($id){
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://colegioclassea.com.br/centro/wp-json/wp/v2/posts/'.$id);
    $body=$response->getBody(); 
    $post = json_decode(($body)->getContents());
    return view('comunicados.show',compact('post'));
}

public function materiaisCentro()
{
    return redirect()->away('https://materiais.colegioclassea.com.br/materiais-centro');
}

public function materiaisEletro()
{
    return redirect()->away('https://materiais.colegioclassea.com.br/materiais-eletro');
}

}
