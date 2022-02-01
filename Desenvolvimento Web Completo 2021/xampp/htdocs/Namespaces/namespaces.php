<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namespaces</title>
</head>

<body>

    <?php

        require_once 'Bibliotecas/Lib1/file1.php';
        require_once 'Bibliotecas/Lib2/file2.php';

        use A\Cliente as C1;
        use B\Cliente as C2;

        $c = new C1();
        echo $c->nome;

        $c = new C2();
        echo $c->nome;

    ?>

</body>

</html>