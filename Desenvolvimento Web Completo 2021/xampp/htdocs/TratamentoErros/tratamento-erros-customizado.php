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

class MinhaExceptionCustomizada extends Exception
{
    private $erro = '';

    public function __construct($erro)
    {
        $this->erro = $erro;
    }

    public function exibirMensagemErrorCustomizada()
    {
        echo '<div style="border: solid 1px #000; padding: 15px; background-color: red; color: white;">';
        echo $this->erro;
        echo '</div>';
    }
}

try {
    throw new MinhaExceptionCustomizada('Esse é um erro de teste');
} catch (MinhaExceptionCustomizada $e) {
    $e->exibirMensagemErrorCustomizada();
}

?>

</body>

</html>