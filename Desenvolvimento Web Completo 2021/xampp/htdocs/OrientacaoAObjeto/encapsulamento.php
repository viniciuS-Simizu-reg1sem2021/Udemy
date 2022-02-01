<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OO - Encapsulamento</title>
</head>

<body>

    <?php

        class Pai {
            private $nome;
            protected $sobrenome;
            public $humor;

            public function __construct($nome, $sobrenome, $humor) {
                $this->nome = $nome;
                $this->sobrenome = $sobrenome;
                $this->humor = $humor;
            }

            public function __get($attr) {
                return $this->$attr;
            }

            public function __set($attr, $value) {
                $this->$attr = $value;
            }

            private function executarMania() {
                echo 'Assobiar';
            }

            protected function responder() {
                echo 'Oi';
            }

            public function executarAcao() {
                $x = rand(1, 10);

                if($x >= 1 && $x <= 8) {
                    $this->responder();
                } else{
                    $this->executarMania();
                }
            }

/*
            public function getNome() {
                return $this->nome;
            }

            public function setNome($novo_nome) {
                $this->nome = $novo_nome;
            }

            public function getSobrenome() {
                return $this->sobrenome;
            }

            public function setSobrenome($novo_sobrenome) {
                $this->sobrenome = $novo_sobrenome;
            }
*/

        }

        class Filho extends Pai {

            public function __construct($nome, $sobrenome, $humor) {
                $this->nome = $nome;
                $this->sobrenome = $sobrenome;
                $this->humor = $humor;
            }

            protected function responder() {
                echo 'Olá';
            }
        }

        /*
        $pai = new Pai('José', 'Silva', 'Neutro');
        
        echo $pai->humor . '<br>';
        $pai->humor = 'Triste';
        echo $pai->humor . '<br>';
        echo $pai->nome . '<br>';
        $pai->nome = 'Psiu';
        echo $pai->nome . '<br>';

        echo $pai->executarAcao();
        */

        $filho = new Filho('Sergin', 'Milionario', 'Contente');
        echo '<pre>';
        print_r($filho);
        echo '</pre><hr>';
        
        echo '<pre>';
        print_r (get_class_methods($filho));
        echo '</pre><hr>';

        $filho->sobrenome = 'Tôledo';
        echo $filho->sobrenome . '<hr>';

        echo '<pre>';
        print_r($filho);
        echo '</pre><hr>';

        echo $filho->nome . '<hr>';

        $filho->executarAcao();
    ?>

</body>

</html>