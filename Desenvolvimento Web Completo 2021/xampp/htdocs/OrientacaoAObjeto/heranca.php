<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OO - Herança</title>
</head>

<body>

    <?php

        class Veiculo {
            public $placa;
            public $cor;

            function acelerar() {
                echo 'ACELERAR';
            }
        }

        class Carro extends Veiculo {
            public $teto_solar = true;

            function __construct($placa, $cor) {
                $this->placa = $placa;
                $this->cor = $cor;
            }

            function abrirTetoSolar() {
                echo 'Abrir teto solar';
            }

            function alterarPosicaoVolante() {
                echo 'Alterar posição volante';
            }
        }

        class Moto extends Veiculo {
            public $contraPesoGuidao = true;

            function __construct($placa, $cor) {
                $this->placa = $placa;
                $this->cor = $cor;
            }

            function empinar() {
                echo 'Empinar';
            }
        }


        $carro = new Carro('ABC1234', 'Preto');
        $moto = new Moto('DEF1122', 'Branca');

        echo '<pre>';
        print_r($carro);
        echo '</pre><hr>';

        echo '<pre>';
        print_r($moto);
        echo '</pre><hr>';

    ?>

</body>

</html>