<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays - Funções Nativas</title>
</head>

<body>

    <?php

        $array = 'String';
        if(is_array($array)) {
            echo 'Sim, é um array';
        } else {
            echo 'Não, não é um array';
        };

        $array = [1 => 'a', 7 => 'b', 18 => 'c'];
        echo '<pre>';
            print_r($array);
        echo '</pre><hr>';

        $chaves_array = array_keys($array);
        echo '<pre>' . print_r($chaves_array) . '</pre><hr>';

        $array = array('teclado', 'mouse', 'cabo hdmi', 'gabinete', 'fonte atx', 'notebook');
        echo '<pre>' . sort($array) . '</pre><hr>'; # Ordena e RETORNA true ou false

        $array = array('teclado', 'mouse', 'cabo hdmi', 'gabinete', 'fonte atx', 'notebook');
        echo '<pre>' . asort($array) . '</pre><hr>'; # Ordena, preserva os indices e RETORNA true ou false

        echo count($array) . '<hr>'; # Array Length

        $array1 = ['osx', 'windows'];
        $array2 = array('linux');
        $array3 = ['solaris'];

        $novoArray = array_merge($array1, $array2, $array3);
        echo '<pre>' . print_r($novoArray) . '</pre><hr>';

        $string = '26/04/2018';
        $arrayRetorno = explode('/', $string);
        echo '<pre>' . $arrayRetorno . '</pre><hr>';

        $array = ['a', 'b', 'x', 'y']; #a,b,x,y
        $stringRetorno = implode(',', $array);
        echo $stringRetorno;

        

    ?>

</body>

</html>