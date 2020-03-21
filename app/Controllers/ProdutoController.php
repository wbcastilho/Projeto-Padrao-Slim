<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use app\Models\Produto;

final class ProdutoController
{
    public function index(Request $request, Response $response, array $args) : Response
    {
        $produto = Produto::listAll();
        
        var_dump($produto);
        exit;

        return $response;
    }

    public function create(Request $request, Response $response, array $args) : Response
    {
       

        return $response;
    }

    public function edit(Request $request, Response $response, array $args) : Response
    {
        return $response;
    }

    public function update(Request $request, Response $response, array $args) : Response
    {
        return $response;
    }

    public function delete(Request $request, Response $response, array $args) : Response
    {
        return $response;
    }
}