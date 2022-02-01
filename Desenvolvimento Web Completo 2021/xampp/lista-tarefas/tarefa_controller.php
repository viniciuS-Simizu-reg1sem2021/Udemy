<?php

	require '../../../../lista-tarefas/tarefa.model.php';
	require '../../../../lista-tarefas/tarefa.service.php';
	require '../../../../lista-tarefas/conexao.php';

	$acao = isset($_GET['acao']) ? $_GET['acao'] :  $acao;
	
	if($acao == 'inserir') {
		$tarefa = new Tarefa();
		$tarefa->tarefa = $_POST['tarefa'];
		
		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->inserir()) {
			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('LOCATION: index.php');
			} else {
				header('LOCATION: nova_tarefa.php?inclusao=1');
			}
		}
		
	} else if($acao == 'recuperar') {
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
	} else if($acao == 'atualizar') {
		$tarefa = new Tarefa();
		$tarefa->id = $_POST['id'];
		$tarefa->tarefa = $_POST['tarefa'];

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {
			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('LOCATION: index.php');
			} else {
				header('LOCATION: todas_tarefas.php');
			}
		}
	} else if($acao == 'remover') {
		$tarefa = new Tarefa();
		$tarefa->id = $_GET['id'];

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->remover()) {
			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('LOCATION: index.php');
			} else {
				header('LOCATION: todas_tarefas.php');
			}
		}
	} else if($acao == 'marcarRealizada') {
		$tarefa = new Tarefa();
		$tarefa->id = $_GET['id'];
		$tarefa->id_status = 2;

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->marcarRealizada()) {
			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('LOCATION: index.php');
			} else {
				header('LOCATION: todas_tarefas.php');
			}
		}
	} else if($acao == 'recuperarTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->id_status = 1;

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	}

?>