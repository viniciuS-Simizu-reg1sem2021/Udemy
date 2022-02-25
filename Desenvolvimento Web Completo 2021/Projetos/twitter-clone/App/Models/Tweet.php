<?php

namespace App\Models;

use MF\Model\Model;

class Tweet extends Model
{
    private $id;
    private $id_usuario;
    private $tweet;
    private $data;

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
        $stmt = $this->db->prepare('INSERT INTO tweets(id_usuario, tweet) VALUES
        (?, ?)');
        $stmt->bindValue(1, $this->id_usuario);
        $stmt->bindValue(2, $this->tweet);

        $stmt->execute();

        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT t.id, t.id_usuario, t.tweet, DATE_FORMAT(t.data, "%d/%m/%Y %H:%i") AS data, u.nome 
        FROM tweets AS t LEFT JOIN usuarios AS u ON (u.id = t.id_usuario) 
        WHERE id_usuario=:id_usuario OR t.id_usuario IN (SELECT id_usuario_seguindo FROM usuarios_seguidores WHERE id_usuario = :id_usuario)
        ORDER BY t.data DESC');
        $stmt->bindValue(':id_usuario', $this->id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPorPagina($limit, $offset)
    {
        $stmt = $this->db->prepare("SELECT t.id, t.id_usuario, t.tweet, DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') AS data, u.nome 
        FROM tweets AS t LEFT JOIN usuarios AS u ON (u.id = t.id_usuario) 
        WHERE id_usuario=:id_usuario OR t.id_usuario IN (SELECT id_usuario_seguindo FROM usuarios_seguidores WHERE id_usuario = :id_usuario)
        ORDER BY t.data DESC
        LIMIT $limit
        OFFSET $offset");
        $stmt->bindValue(':id_usuario', $this->id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalRegistros()
    {
        $stmt = $this->db->prepare("SELECT count(*) AS total
        FROM tweets AS t LEFT JOIN usuarios AS u ON (u.id = t.id_usuario) 
        WHERE id_usuario=:id_usuario OR t.id_usuario IN (SELECT id_usuario_seguindo FROM usuarios_seguidores WHERE id_usuario = :id_usuario)");
        $stmt->bindValue(':id_usuario', $this->id_usuario);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function removerTweet($id_tweet)
    {
        $stmt = $this->db->prepare('DELETE FROM tweets WHERE id=?');
        $stmt->bindValue(1, $id_tweet);
        return $stmt->execute();
    }
}

?>