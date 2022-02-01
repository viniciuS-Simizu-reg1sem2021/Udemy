<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try - Catch - Finally - Throw</title>
</head>

<body>

    <?php

        try {
            echo '<h3> *** Try *** </h3>';

            #$sql = 'select * from clientes';
            #mysql_query($sql);

            if(!(file_exists('a.php'))) {
                throw new Exception('O arquivo em questão deveria estar disponivel às ' . date('d/m/Y H:i:s') . ' horas, mas não estava. Vamos seguir mesmo assim!');
                #throw new Error('O arquivo em questão deveria estar disponivel às ' . date('d/m/Y H:i:s') . ' horas, mas não estava. Vamos seguir mesmo assim!');
            }
        } catch (Error $e) {
            echo '<h3> *** Catch Error *** </h3>';
            echo "<p style='color: red'>$e</p>";
        } catch (Exception $e) {
            echo '<h3> *** Catch Exception *** </h3>';
            echo "<p style='color: red'>$e</p>";

        } finally {
            echo '<h3> *** Finally *** </h3>';
        }

    ?>

</body>

</html>