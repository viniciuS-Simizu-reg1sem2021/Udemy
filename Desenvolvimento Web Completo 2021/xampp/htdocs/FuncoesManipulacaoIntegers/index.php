<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Nativas de Manipulação de Integers</title>
</head>

<body>

    <?php

        $num = 7.3;

        echo ceil($num) . '<br>';    # Arredonda para CIMA

        echo floor($num) . '<br>';   # Arredonda para BAIXO

        echo round($num) . '<hr>';   # Arredonda com base no número decimal

        echo rand(10, 20) . '<br>';    # Gera um número Aleatório entre 10 e 20 (default/sem parametrôs = 0 até o randmax)
        echo getrandmax() . '<hr>';

        echo sqrt(3);   # Raíz Quadrada

    ?>

</body>

</html>