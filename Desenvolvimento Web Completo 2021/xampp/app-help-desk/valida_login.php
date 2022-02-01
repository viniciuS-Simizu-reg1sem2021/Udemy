<?php

    session_start();


    $autenticacao = false;
    $usuario_id;
    $perfilId;

    $usuarioApp = [
        ['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123', 'perfilId' => 1],
        ['id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123', 'perfilId' => 1],
        ['id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '123', 'perfilId' => 2],
        ['id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123', 'perfilId' => 2]
    ];

    foreach($usuarioApp as $usuario) {
        if($usuario['email'] === $_POST['email'] && $usuario['senha'] === $_POST['senha']) {
            $usuario_id = $usuario['id'];
            $autenticacao = true;
            $perfilId = $usuario['perfilId'];
        }
    }

    if($autenticacao) {
        $_SESSION['token'] = true;
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfilId'] = $perfilId;
        header('Location: home.php');
    } else {
        $_SESSION['token'] = false;
        header('Location: https://localhost/HelpDesk/index.php?login=erro');
    }

?>