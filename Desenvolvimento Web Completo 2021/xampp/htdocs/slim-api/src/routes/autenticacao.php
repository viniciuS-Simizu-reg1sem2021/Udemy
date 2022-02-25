<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Usuario;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Rotas para geração de Token
$app->post('/api/token', function (Request $request, Response $response) {

    $dados = $request->getParsedBody();

    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first();

    if(!is_null($usuario) && sha1($senha) === $usuario->senha) {

        // Gerar Token
        $secretKey = $this->get('settings')['secretKey'];
        $accessKey = JWT::encode($usuario, $secretKey, 'HS256');

        return $response->withJson([
            'key' => $accessKey
        ]);
    }
    
    return $response->withJson([
        'status' => 'error'
    ]);

});
