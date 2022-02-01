<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OO - Abstração</title>
</head>

<body>

    <?php
        class Funcionario {

            public $nome = null;
            public $telefone = null;
            public $numFilhos = null;
            public $cargo = null;
            public $salario = null;

            function __construct($nome) {
                $this->nome = $nome;
            }


            function __destruct() {

            }

            # Getter and Setter (Overloading / Sobrecarga)
            function __set($atributo, $valor) {
                $this->$atributo = $valor;
            }

            function __get($atributo) {
                return $this->$atributo;
            }


            function correr() {
                return $this->__get('nome') . ' está correndo';
            }

/*
            # Getter and Setter
            function setNome($nome) {
                $this->nome = $nome;
            }

            function getNome() {
                return $this->nome;
            }

            function setTelefone($telefone) {
                $this->telefone = $telefone;
            }

            function getTelefone() {
                return $this->telefone;
            }

            function setNumFilhos($numFilhos) {
                $this->numFilhos = $numFilhos;
            }

            function getNumFilhos() {
                return $this->numFilhos;
            }
*/

            function resumirCadFunc() {
                return $this->__get('nome') . ' possui ' . $this->__get('numFilhos') . ' filhos';
            }
        }

        $funcionario = new Funcionario('Paulo');
        
        $funcionario->__set('nome', 'José');
        $funcionario->__set('numFilhos', 2);
        
        echo $funcionario->resumirCadFunc() . '<hr>';

        echo $funcionario->__get('nome') . ' possui ' . $funcionario->__get('numFilhos') . ' filhos';

        unset($funcionario); # Executa o __destruct propositalmente
    ?>

</body>

</html>