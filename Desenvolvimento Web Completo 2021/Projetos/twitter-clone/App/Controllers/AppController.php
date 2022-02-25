<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
    public function timeline()
    {
        session_start();

        $this->validaAutenticacao();
        
        $usuario = Container::getModel('usuario');
        $usuario->id = $_SESSION['id'];

        $this->view->info_usuario = $usuario->getInfoUsuario();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_seguindo = $usuario->getTotalSeguindo();
        $this->view->total_seguidores = $usuario->getTotalSeguidores();


        $tweet = Container::getModel('Tweet');
        $tweet->id_usuario = $usuario->id;

        $total_registros_pagina = 5;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * 10;

        // $tweets = $tweet->getAll();
        $tweets = $tweet->getPorPagina($total_registros_pagina, $deslocamento);
        $total_tweet = $tweet->getTotalRegistros();
        $total_paginas = ceil($total_tweet['total'] / $total_registros_pagina);

        $this->view->pagina_ativa = $pagina;

        $this->view->total_paginas = $total_paginas;

        $this->view->tweets = $tweets;

        $this->render('timeline');
        
    }

    public function tweet()
    {
        session_start();

        $this->validaAutenticacao();
            
        $tweet = Container::getModel('Tweet');

        $tweet->__set('tweet', $_POST['tweet'])
        ->__set('id_usuario', $_SESSION['id']);

        $tweet->salvar();

        header('LOCATION: /timeline');

    }

    public function validaAutenticacao()
    {
        session_start();
        if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome'])) {
            header('LOCATION: /?login=erro');
        }
    }

    public function quemSeguir()
    {
        $this->validaAutenticacao();

        $perquisarPor = isset($_POST['pesquisarPor']) ? $_POST['pesquisarPor'] : '';

        $usuarios = [];
        
        $usuario = Container::getModel('usuario');
        $usuario->nome = $perquisarPor;
        $usuario->id = $_SESSION['id'];

        if($perquisarPor != '')
        {
            $usuarios = $usuario->getAll();

        }
        
        $this->view->info_usuario = $usuario->getInfoUsuario();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_seguindo = $usuario->getTotalSeguindo();
        $this->view->total_seguidores = $usuario->getTotalSeguidores();
        
        $this->view->usuarios = $usuarios;

        $this->render('quem_seguir');
    }

    public function acao()
    {

        $this->validaAutenticacao();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario = Container::getModel('usuario');
        $usuario->id = $_SESSION['id'];

        if($acao == 'seguir')
        {
            $usuario->seguirUsuario($id_usuario_seguindo);
        } else if($acao == 'deixar_de_seguir')
        {
            $usuario->deixarSeguirUsuario($id_usuario_seguindo);
        }
        header('LOCATION: /quem_seguir');
    }

    public function removerTweet()
    {
        $this->validaAutenticacao();

        $id_tweet = isset($_GET['id']) ? $_GET['id'] : '';

        $tweet = Container::getModel('tweet');
        $tweet->id = $id_tweet;
        $tweet->removerTweet($tweet->id);
        header('LOCATION: /timeline');
    }
}

?>