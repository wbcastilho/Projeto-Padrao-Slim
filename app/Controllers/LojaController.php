<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use app\Models\Loja;

final class LojaController
{
    public function index(Request $request, Response $response, array $args) : Response
    {
        $loja = Loja::listAll();
        
        var_dump($loja);
        exit;

        return $response;
    }

    public function create(Request $request, Response $response, array $args) : Response
    {
        try
        {
            $data = $request->getParsedBody();

            $loja = new Loja();
        
            $loja->setnome($data['nome']);
            $loja->setendereco($data['endereco']);
            $loja->settelefone($data['telefone']);
            $ret = $loja->insert();

            if($ret === true)
            {
                $response = $response->withJson([
                    'message'=>'Loja inserida com sucesso!'
                ]);
            }
            else
            {
                $response = $response->withJson([
                    'message'=>'Erro ao inserir loja.'
                ]);
            }
        }
        catch(Exception $e)
        {
            $response = $response->withJson([
                'message'=>'Erro ao inserir loja.'
            ]);
        }

        return $response;
    }

    public function edit(Request $request, Response $response, array $args) : Response
    {
        return $response;
    }

    public function update(Request $request, Response $response, array $args) : Response
    {
        try
        {
            $loja = new Loja();

            $id = $args['id'];
            $data = $request->getParsedBody();           
        
            if(!isset($data['nome']))                           
                throw new \Exception("Preenchimento do campo nome é requerido.");            
            else if(empty($data['nome']))
                throw new \Exception("Preenchimento do campo nome é requerido.");       
            else if(!isset($data['endereco']))
                throw new \Exception("Preenchimento do campo endereço é requerido.");
            else if(!isset($data['telefone']))
                throw new \Exception("Preenchimento do campo telefone é requerido.");

            $loja->setnome($data['nome']);
            $loja->setendereco($data['endereco']);
            $loja->settelefone($data['telefone']);
            $ret = $loja->update($id);

            if($ret === true)
            {
                $response = $response->withJson([
                    'message'=>'Loja alterada com sucesso!'
                ]);
            }
            else
            {
                $response = $response->withJson([
                    'message'=>'Erro ao alterar loja.'
                ]);
            }
        }
        catch(\Exception $e)
        {
            $response = $response->withJson([
                'message'=>$e->getMessage()
            ]);
        }

        return $response;   
    }

    public function delete(Request $request, Response $response, array $args) : Response
    {
        return $response;
    }
}