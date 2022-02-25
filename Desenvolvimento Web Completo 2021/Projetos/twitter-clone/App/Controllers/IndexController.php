<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{
    public function index() {

        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('index');

    }

    public function inscreverse() {
        $this->view->usuario = [
            'nome' => '',
            'email' => '',
            'senha' => ''
        ];

        $this->view->erroCadastro = false;

        $this->render('inscreverse');
    }

    public function registrar()
    {
        $usuario = Container::getModel('usuario');
        $usuario->__set('nome', $_POST['nome'])->__set('email', $_POST['email'])
        ->__set('senha', password_hash($_POST['senha'], PASSWORD_ARGON2I));

        if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0)
        {

            $usuario->salvar();
            $this->render('cadastro');
        } else
        {
            $this->view->usuario = [
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'senha' => $usuario->senha
            ];

            $this->view->erroCadastro = true;

            $this->render('inscreverse');
        }
    }
}

?>