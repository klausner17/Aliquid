<?php
	include("funcoes.php");
	$login = $_GET['login'];
	$nome = $_GET['nome'];
	$sobrenome = $_GET['sobrenome'];
	$senha = $_GET['senha'];
	if(!isset($_GET['responsavel'])){
		$responsavel = 0;
	}else{
		$responsavel = 1;
	}
	cadastrar_usuario($nome, $sobrenome,$login, $senha, $responsavel);
?>