<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OO - Polimorfismo</title>
</head>

<body>

    <?php

        class Veiculo {
            public $placa;
            public $cor;

            function acelerar() {
                echo 'ACELERAR';
            }

            function freiar() {
                echo 'Freiar';
            }

            function trocarMarcha() {
                echo 'Marcha trocada';
            }
        }

        class Carro extends Veiculo {
            public $teto_solar;

            function __construct($placa, $cor, $teto_solar) {
                $this->placa = $placa;
                $this->cor = $cor;
                $this->teto_solar = $teto_solar;
            }

            function abrirTetoSolar() {
                echo 'Abrir teto solar';
            }

            function alterarPosicaoVolante() {
                echo 'Alterar posição volante';
            }
        }

        class Moto extends Veiculo {
            public $contraPesoGuidao;

            function __construct($placa, $cor, $contraPesoGuidao) {
                $this->placa = $placa;
                $this->cor = $cor;
                $this->contraPesoGuidao = $contraPesoGuidao;
            }

            function empinar() {
                echo 'Empinar';
            }

            function trocarMarcha() {
                echo 'Desengatar a marcha com a mão e engatar a marcha com o pé';
            }
        }


        $carro = new Carro('ABC1234', 'Preto', true);
        $moto = new Moto('DEF1122', 'Branca', false);

        echo '<pre>';
        print_r($carro);
        echo '</pre><hr>';

        echo '<pre>';
        print_r($moto);
        echo '</pre><hr>';

    ?>

</body>

</html>