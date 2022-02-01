<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Nativas de Manipulação de Datas</title>
</head>

<body>

    <?php

        echo date('d/m/Y H:i') . '<hr>'; # Recupera a data atual, documentação --> https://www.php.net/manual/en/datetime.format.php

        echo date_default_timezone_get() . '<br><br>';    # Recupera o timezone default da aplicação
        date_default_timezone_set('America/Sao_Paulo') . '<br>';    # Atualizar o timezone default da aplicação
        echo date_default_timezone_get() . '<hr>';

        $data_inicial = '2018-04-24';
        $date_final = '2018-05-15';
        
        # TimeStamp 01/01/1970

        $data_inicial = strtotime($data_incial);    # Retorno em segundos
        $data_final = strtotime($data_final);

        $diferenca_times = $data_final - $data_inicial;
        $segundos_por_dia = 24 * 60 * 60;

        echo 'A diferença entre a data inicial e final é de ' . $diferenca_times / $segundos_por_dia;

    ?>

</body>

</html>