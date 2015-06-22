<?php
	include("funcoes.php");
	$usuario = $_COOKIE['aliquid_user'];
	$peca = $_GET['produto'];
	$lote = $_GET['lote'];
	$qtde = $_GET['qtde'];
	$ocorrido = $_GET['ocorrido'];
	$acao = $_GET['acao'];
	$responsavel = $_GET['responsavel'];
	cadastrar_rnc($usuario, $peca, $lote, $qtde, $ocorrido, $acao, $responsavel);
?>