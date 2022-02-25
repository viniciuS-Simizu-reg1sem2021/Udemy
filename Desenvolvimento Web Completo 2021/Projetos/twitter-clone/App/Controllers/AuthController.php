<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{
    public function autenticar()
    {
        $usuario = Container::getModel('Usuario');

        $usuario->__set('email', $_POST['email'])
        ->__set('senha', $_POST['senha']);

        $usuario->autenticar();

        if(!is_null($usuario->id) && !is_null($usuario->nome))
        {
            session_start();

            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->nome;

            header('LOCATION: /timeline');
        } else
        {
            header('LOCATION: /?login=erro');
        }
    }

    public function sair()
    {
        session_start();
        session_destroy();
        header('LOCATION: /');
    }
}

?>