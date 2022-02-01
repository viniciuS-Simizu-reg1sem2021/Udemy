<?php
	
	class TarefaService {
		
		private $conexao;
		private $tarefa;
		
		public function __construct(Conexao $conexao, Tarefa $tarefa) {
			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
		}
		# CRUD
		public function inserir() {
			$query = 'INSERT INTO tb_tarefas(tarefa) VALUES (:tarefa)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':tarefa', $this->tarefa->tarefa);
			return $stmt->execute();
		}
		
		public function recuperar() {
			$query = 'SELECT t.id, s.status, t.tarefa, t.id_status 
			FROM tb_tarefas AS t 
			LEFT JOIN tb_status AS s on (t.id_status = s.id)';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function atualizar() {
			$query = 'UPDATE tb_tarefas SET tarefa=? WHERE id=?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->tarefa);
			$stmt->bindValue(2, $this->tarefa->id);
			return $stmt->execute();
		}
		
		public function remover() {
			$query = 'DELETE FROM tb_tarefas WHERE id=?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->id);
			return $stmt->execute();
		}

		public function marcarRealizada() {
			$query = 'UPDATE tb_tarefas SET id_status=? WHERE id=?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->id_status);
			$stmt->bindValue(2, $this->tarefa->id);
			return $stmt->execute();
		}

		public function recuperarTarefasPendentes() {
			$query = 'SELECT t.id, s.status, t.tarefa, t.id_status 
			FROM tb_tarefas AS t 
			LEFT JOIN tb_status AS s on (t.id_status = s.id)
			WHERE t.id_status = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->tarefa->id_status);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}
	
?>