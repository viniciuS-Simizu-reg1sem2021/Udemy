<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Each</title>
</head>

<body>

    <?php

        $itens = ['sofá', 'mesa', 'cadeira', 'fogão', 'geladeira'];

        echo '<pre>' . print_r($itens) . '</pre><hr>';

        foreach($itens as $item) {
            echo $item;

            if($item == 'mesa') {
                echo '(*compre uma mesa)';
            }

            echo '<br>';
        }

        $funcionarios = [
            ['João', 2500], 
            ['Maria', 3000], 
            ['Júlia', 2200]
        ];

        echo '<pre>' . print_r($funcionarios) . '</pre><hr>';

        foreach($funcionarios as $i => $funcionario) { # idx = chave, nomeFuncionario = valor
            echo "ID: $i<br>";

            foreach($funcionario as $j => $valor) {
                echo "$j - $valor<br>";
            }

            echo '<hr>';
        }

    ?>

</body>

</html>