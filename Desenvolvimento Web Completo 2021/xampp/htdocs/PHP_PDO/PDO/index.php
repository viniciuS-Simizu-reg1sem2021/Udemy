<?php

if(!empty($_POST['usuario']) && !empty($_POST['senha'])) {
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'root', '');

            $query = "SELECT * FROM tb_usuarios WHERE nome=:usuario AND senha=:senha";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_STR);
            $stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_STR);

            $stmt->execute();
            print_r($stmt->fetch(PDO::FETCH_ASSOC));

            # $stmt = $conexao->query($query);

            /*foreach($conexao->query($query)->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
                print_r($value);
                echo '<hr>';
            }*/
        
            /*
            $lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); # PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_BOTH, PDO::FETCH_OBJ
        
            foreach($lista_usuarios as $key => $value) {
                echo $value['nome'];
                echo '<hr>';
            }
            */
        
        
            
            /*
            $query = 'SELECT * FROM tb_usuarios ORDER BY nome DESC LIMIT 1';
        
            $stmt = $conexao->query($query);
            $usuario = $stmt->fetch(PDO::FETCH_OBJ); # PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_BOTH
            echo '<pre>';
            print_r($usuario);
            echo '</pre>';
        
            echo $usuario->nome;
            */
        
        
            
            /*$query = 'create table if not exists tb_usuarios(
                    id int not null primary key auto_increment,
                    nome varchar(50) not null,
                    email varchar(100) not null,
                    senha varchar(32) not null
                    )';
        
            $retorno = $conexao->exec($query);
            echo $retorno;
            
            $query = 'insert into tb_usuarios(nome, email, senha) values 
            ("Estevan Tiaraju", "reinha@overwa.com", "12345"),
            ("Biel Fiuza", "bielzin@outlook.com", "bedrock"),
            ("Otavio Uchiha", "pulse@tk.com", "bipbipbip")';
            
            $retorno = $conexao->exec($query);
            echo $retorno; 
            */
            
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getCode() . '<br>Mensagem: ' . $e->getMessage();
    }
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - PDO</title>
    </head>

    <body>
        <form method="POST" action="index.php">
            <h3>Login</h3>
            <hr>
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Finalizar</button>
        </form>
    </body>
</html>
