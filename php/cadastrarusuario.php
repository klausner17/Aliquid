<?php
	include("usuario.php");
	$login = $_GET['login'];
	$nome = $_GET['nome'];
	$sobrenome = $_GET['sobrenome'];
	$senha = $_GET['senha'];
	$responsavel = $_GET['responsavel'];
	cadastrar_usuario($login, $nome, $sobrenome, $senha, $responsavel);
?>