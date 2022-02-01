<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atríbutos e Métodos Estáticos</title>
</head>

<body>

    <?php

class Exemplo
{
    public static $atributo1 = 'Eu sou um Atríbuto ESTÁTICO';
    public $atributo2 = 'Eu sou um Atríbuto NORMAL';

    public static function metodo1()
    {
        echo 'Eu sou um Método ESTÁTICO<hr>';
    }

    public function metodo2()
    {
        echo 'Eu sou um Método NORMAL';
    }
}

echo Exemplo::$atributo1 . '<hr>';
Exemplo::metodo1();
$exemplo = new Exemplo();
$exemplo->atributo1;

?>

</body>

</html>