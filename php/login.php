<?php
	include("funcoes.php");
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	login($login, $senha);
?>