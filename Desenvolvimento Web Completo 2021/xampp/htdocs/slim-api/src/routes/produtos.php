<?php

// Rotas para produtos

/*
ORM -> Object Relational Mapper (Mapeador de objeto relacional)
Illuminate
Eloquent ORM
*/

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

$app->group('/api/v1', function() {

    // Lista produtos
    $this->get('/produtos/lista', function(Request $request, Response $response) {
        $produtos = Produto::get();

        return $response->withJson($produtos);
    });

    // Adiciona um produto
    $this->post('/produtos/adiciona', function (Request $request, Response $response) {
        $dados = $request->getParsedBody();
        $produto = Produto::create($dados);
        return $produto;
    });

    // Recupera produto para um determinado ID
    $this->get('/produtos/lista/{id}', function (Request $request, Response $response, $args) {

        $produto = Produto::findOrFail( $args['id'] );
        return $response->withJson($produto);
        
    });
    
    // Atualiza produto para um determinado ID
    $this->put('/produtos/atualiza/{id}', function (Request $request, Response $response, $args) {
        $dados = $request->getParsedBody();
        
        $produto = Produto::findOrFail( $args['id'] );
        $produto->update($dados);
        return $response->withJson($produto);
        
    });
    
    // Remove produto para um determinado ID
    $this->get('/produtos/remove/{id}', function (Request $request, Response $response, $args) {

        $produto = Produto::findOrFail( $args['id'] );
        $produto->delete();
        return $response->withJson($produto);
        
    });
});
