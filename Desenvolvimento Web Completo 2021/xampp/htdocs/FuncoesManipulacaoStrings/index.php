<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Nativas de Manipulação de Strings</title>
</head>

<body>

    <?php

        $texto = 'Curso completo de PHP';

        echo $texto . '<br>';
        echo strtolower($texto) . '<br>';   # String To Lower
        echo strtoupper($texto) . '<br>';   # String To Upper
        echo ucfirst($texto) . '<hr>';   # Upper Case First

        echo strlen($texto);    # String Length

        echo str_replace('PHP', 'JavaScript', $texto) . '<hr>';  # String Replace (Case Sensitive PHP != php != Php)

        echo substr($texto, 6, 15) . '...';

    ?>

</body>

</html>