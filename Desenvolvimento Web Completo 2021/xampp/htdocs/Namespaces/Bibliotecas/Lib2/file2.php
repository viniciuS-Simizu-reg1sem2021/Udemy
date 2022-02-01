<?php
    namespace B;

    interface CadastroInterface {
        public function remover();
    }

    class Cliente implements CadastroInterface {
        public $nome = 'Pliniu';

        public function __get($attr) {
            return $this->$attr;
        }

        public function remover() {
            echo 'Remover';
        }
    }
?>