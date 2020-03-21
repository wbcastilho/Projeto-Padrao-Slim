<?php

use function src\slimConfiguration;
use app\Controllers\ProdutoController;
use app\Controllers\LojaController;

$app = new \Slim\App(slimConfiguration());

//==============================================
//ROTAS
//==============================================

$app->get('/', LojaController::class . ':index');
$app->post("/lojas/create", LojaController::class . ':create');
$app->post("/lojas/{id}", LojaController::class . ':update');



//==============================================

$app->run();