<?php
	include("usuario.php");
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	login($login, $senha);
?>