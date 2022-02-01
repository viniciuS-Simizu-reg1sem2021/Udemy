<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>

    <?php

        # Sequêncial (Númericos)
        $listaFrutas = ['Banana', 'Maçã', 'Morango', 'Uva', 'Abacate'];

        $listaFrutas[] = 'Pêra';

        echo '<pre>';
            var_dump($listaFrutas);
        
        echo '</pre>';
        echo '<hr>';
        echo '<pre>';
            print_r($listaFrutas);
        echo '</pre>';

        # Associativos
        $lista_frutas = array(
            'a' => 'Banana',
            'b' => 'Maçã',
            'c' => 'Morango',
            'd' => 'Uva',
            'e' => 'Abacate'
        );
        echo '<pre>';
        var_dump($lista_frutas);
        echo '</pre>';
        $lista_frutas['w'] = 'Pêra';
        echo $lista_frutas['w'];


    ?>

</body>

</html>