<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaces</title>
</head>

<body>

    <?php

interface EquipamentoEletronicoInterface
{
    public function ligar();
    public function desligar();
}

class Geladeira implements EquipamentoEletronicoInterface
{
    public function abrirPorta()
    {
        echo 'Abrir a Porta';
    }

    public function ligar()
    {
        echo 'ligar';
    }

    public function desligar()
    {
        echo 'desligar';
    }
}

class Tv implements EquipamentoEletronicoInterface
{
    public function trocarCanal()
    {
        echo 'Trocar Canal';
    }

    public function ligar()
    {
        echo 'Ligar';
    }

    public function desligar()
    {
        echo 'Desligar';
    }
}

$g = new Geladeira();
$t = new Tv();

# --------------------------------------------------------------------

interface MamiferoInterface
{
    public function respirar();
}

interface TerrestreInterface
{
    public function andar();
}

interface AquaticoInterface
{
    public function nadar();
}

class Humano implements MamiferoInterface, TerrestreInterface
{
    public function conversar()
    {
        echo 'Conversar';
    }

    public function respirar()
    {
        echo 'Respirar';
    }

    public function andar()
    {
        echo 'Andar';
    }
}

class Golfinho implements MamiferoInterface, AquaticoInterface
{
    public function esguichar()
    {

    }

    public function respirar()
    {
        echo 'Respirar';
    }

    public function nadar()
    {
        echo 'Nadar';
    }
}

# --------------------------------------------------------------------

interface AnimalInterface
{
    public function comer();
}

interface AveInterface extends AnimalInterface
{
    public function voar();
}

class Papagaio implements AveInterface
{
    public function voar()
    {
        echo 'Voar';
    }

    public function comer()
    {
        echo 'Comer';
    }
}

?>

</body>

</html>