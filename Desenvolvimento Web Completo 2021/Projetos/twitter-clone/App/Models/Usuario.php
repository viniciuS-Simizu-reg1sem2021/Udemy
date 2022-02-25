<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
        return $this;
    }

    public function salvar()
    {
        $query = 'INSERT INTO usuarios(nome, email, senha) VALUES(?, ?, ?)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->senha);
        $stmt->execute();

        return $this;
    }

    public function validarCadastro()
    {
        $valido = true;

        if(strlen($this->nome) < 3)
        {
            $valido = false;
        } else if(strlen($this->email) < 3)
        {
            $valido = false;
        } else if(strlen($this->senha) < 4)
        {
            $valido = false;
        }

        return $valido;
    }

    public function getUsuarioPorEmail()
    {
        $query = 'SELECT email FROM usuarios WHERE email=?';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->email);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function autenticar()
    {
        $query = 'SELECT id, nome, senha FROM usuarios WHERE email=?';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->email);
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if(password_verify($this->senha, $usuario['senha']))
        {
            $this->id = $usuario['id'];
            $this->nome = $usuario['nome'];
        }
        
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT u.id, u.nome, u.email, 
        (SELECT count(*) FROM usuarios_seguidores AS us WHERE us.id_usuario = :id_usuario AND us.id_usuario_seguindo = u.id) AS seguindo_sn
        FROM usuarios AS u
        WHERE u.nome LIKE :nome AND u.id != :id_usuario');

        $stmt->bindValue(':nome', '%'.$this->nome.'%');
        $stmt->bindValue(':id_usuario', $this->id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function seguirUsuario($id_usuario_seguindo)
    {
        $stmt = $this->db->prepare('INSERT INTO usuarios_seguidores(id_usuario, id_usuario_seguindo) VALUES (?, ?)');
        $stmt->bindValue(1, $this->id);
        $stmt->bindValue(2, $id_usuario_seguindo);

        return $stmt->execute();
    }
    
    public function DeixarSeguirUsuario($id_usuario_seguindo)
    {
        $stmt = $this->db->prepare('DELETE FROM usuarios_seguidores WHERE id_usuario = ? AND id_usuario_seguindo = ?');
        $stmt->bindValue(1, $this->id);
        $stmt->bindValue(2, $id_usuario_seguindo);
    
        return $stmt->execute();
    }

    public function getInfoUsuario()
    {
        $stmt = $this->db->prepare('SELECT nome FROM usuarios WHERE id=?');
        $stmt->bindValue(1, $this->id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTotalTweets()
    {
        $stmt = $this->db->prepare('SELECT count(*) AS total_tweets FROM tweets WHERE id_usuario=?');
        $stmt->bindValue(1, $this->id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTotalSeguindo()
    {
        $stmt = $this->db->prepare('SELECT count(*) AS total_seguindo FROM usuarios_seguidores WHERE id_usuario=?');
        $stmt->bindValue(1, $this->id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTotalSeguidores()
    {
        $stmt = $this->db->prepare('SELECT count(*) AS total_seguidores FROM usuarios_seguidores WHERE id_usuario_seguindo=?');
        $stmt->bindValue(1, $this->id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
} 

?>