<?php

    session_start();
    
    $file = fopen('../../app-help-desk/arquivo.hd', 'a');

    foreach($_POST as $i => $info) {
        $_POST[$i] = str_replace('#', '-', $info);
    }

    $texto = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL;

    fwrite($file, $texto);

    fclose($file);

    header('Location: abrir_chamado.php');

?>