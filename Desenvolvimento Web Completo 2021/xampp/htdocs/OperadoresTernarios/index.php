<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores Ternarios</title>
</head>

<body>

    <?php
        $possuiCartao = true;
        $teste = $possuiCartao ? 'Possui' : 'Não Possui';

        echo $teste;
    ?>

    <?= 10 < 8 ? 'Sim' : 'Não'; ?>
    <?= $possuiCartao ? 'Sim' : 'Não'; ?>


</body>

</html>