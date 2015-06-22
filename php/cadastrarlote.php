<?php
	include("funcoes.php");
	$codigo = $_GET['codigo'];
	$descricao = $_GET['descricao'];
	cadastrar_lote($codigo, $descricao);
?>