<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casting de Tipos</title>
</head>

<body>

    <?php

        # gettype() => retorna tipo da variável
        $valor = 10;

        $valor2 = (float) $valor;

        $valor3 = 10;
        $valor3 = (string) $valor3;

        $valor4 = 10.75;
        $valor4 = (int) $valor4;    # Arredonda para baixo (floor)

        $valor5 = '';
        $valor5 = (boolean) $valor5;    # Valores sem representação (null, '') retorna false

        echo gettype($valor);
        echo '<hr>';
        echo gettype($valor2);
        echo '<hr>';
        echo gettype($valor3);
        echo '<hr>';
        echo gettype($valor4);
        echo $valor4;
        echo '<hr>';
        echo gettype($valor5);

    ?>

</body>

</html>