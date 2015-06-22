<?php
	include("funcoes.php");
	$usuario = $_COOKIE['aliquid_user'];
	$produto = $_GET['produto'];
	$cliente = $_GET['cliente'];
	$serial = $_GET['serial'];
	$ocorrido = $_GET['ocorrido'];
	$acao = $_GET['acao'];
	$responsavel = $_GET['responsavel'];
	cadastrar_rrc($usuario, $produto, $cliente, $serial, $ocorrido, $acao, $responsavel);
?>