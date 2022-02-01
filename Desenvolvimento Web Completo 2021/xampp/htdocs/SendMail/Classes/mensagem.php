<?php
class Mensagem
{
    private $destinatario;
    private $assunto;
    private $mensagem;
    public $status = ['codigo_status' => null, 'descricao_status => ""'];

    public function __construct($destinatario, $assunto, $mensagem)
    {
        $this->destinatario = $destinatario;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function mensagemValida()
    {
        if(empty($this->destinatario) || empty($this->assunto) || empty($this->mensagem)) {
            return false;
        }
        return true;
    }
}
