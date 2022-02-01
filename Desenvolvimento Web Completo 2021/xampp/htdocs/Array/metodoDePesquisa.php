<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays - Método de Pesquisa</title>
</head>

<body>

    <?php

        # in_array() => true ou false
        # array_search() => retorna o indice (indexOf() - JavaScript) - Se não existir, retorna NULL

        $listaFrutas = ['Banana', 'Maçã', 'Morango', 'Uva'];

        echo '<pre>';
        print_r($listaFrutas);
        echo '</pre>';

        $existe = in_array('Maçã', $listaFrutas);
        if($existe) {
            echo 'Sim, o valor pesquisado existe no Array';
        } else {
            echo 'Não, o valor pesquisado NÃO existe no Array';
        }
        
        $existe = array_search('Morango', $listaFrutas);
        if($existe != null) {
            echo 'Sim, o valor pesquisado existe no Array';
        } else {
            echo 'Não, o valor pesquisado NÃO existe no Array';
        }

        $listaCoisas = [
            'frutas' => $listaFrutas,
            'pessoas' => ['João', 'Maria']
        ];

        echo '<pre>';
        print_r($listaCoisas);
        echo '</pre>';

        echo in_array('Uva', $listaCoisas['frutas']);

    ?>

</body>

</html>